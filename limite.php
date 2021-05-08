<?php

class conta{
  public $agencia;
  public $conta;
  private $senha;
  private $saldo;
  public $extrato = array();
  private $logado = false;
  public $limite = 1000;
  

  public function AbreConta($ag,$cc,$pwd){
    $this->agencia = $ag;
    $this->conta = $cc;
    $this->senha = md5($pwd);
    $this->saldo = 0;
  }

  public function deposito($valor){
    if($this->logado == true){
      $this->saldo = $this->saldo + $valor;
      $this->extrato('deposito', $valor);
      // echo "saldo: R$" .$this->saldo."\n";
    }
  }

  public function saque($valor){
    if($this->logado == true){ 
      if($this->saldo - $valor > 0){
        $this->saldo = $this->saldo - $valor;
        $this->extrato('saque', $valor);
      }else if ($this->limite - $valor > 0){
        $this->limite = $this-> limite + $this->saldo;
        $this->limite = $this-> limite - $valor;
        $this->saldo = $this-> saldo - $this->saldo;
      }else{
        echo "saldo zerado";
    } 

      // echo "saldo: R$" . $this->saldo."\n";
    }
  }

  public function extrato($tipo, $valor){
    if($this->logado == true){
      $this->extrato[] = [
        'data' => date("d-m-Y H:i:s"),
        'tipo' => $tipo,
        'valor' => $valor
      ];
    }
  }

  public function acessar($agencia,$conta,$senha){
    if($conta == $this->conta){
      if($agencia == $this->agencia){
        if(md5($senha) == $this->senha){
          $this->logado = true;
        }else{
          echo "senha incorreta";
        }
      }else{
        echo "Agencia incorreta";
      }
    }else{
      echo "conta incorreta";
    }

  }

  public function getSaldo(){
    if($this->logado == true){
      echo "Seu Saldo é de R$" . number_format($this->saldo,2,',','.');
      echo "Seu limite é de R$" . number_format($this->limite,2,',','.');
    }
  }

}
$conta = new conta();
$conta->AbreConta(021,56.852,'repolho');


$conta->acessar(021,56.852,'repolho');

$conta->deposito(1000);
$conta->saque(1000);


foreach($conta->extrato as $extrato){
  echo $extrato['data'].'-'.$extrato['tipo'].' R$'. $extrato['valor']."\n " ;
}
$conta->getSaldo();

print_r($conta);