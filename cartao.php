<?php

class cartao{
  public $agencia;
  public $conta;
  private $senha;
  private $saldo;
  private $limitecartao;
  public $nomecartao;
  public $validade;
  public $ccv;


  public function cartaodecred($ag,$cc,$pwd){
    $this->agencia = $ag;
    $this->conta = $cc;
    $this->senha = md5($pwd);
    $this->saldo = 2000;
    $this->validade = 20/04/22;
    $this->ccv = 580;
    

 }

 public function limitecartao($valor){
    $this->limite = 2000;
 }

 public function extrato($tipo, $valor){
      $this->extrato[] = [
        'data' => date("d-m-Y H:i:s"),
        'tipo' => $tipo,
        'valor' => $valor
      ];
    }

 public function getSaldo(){
          echo "Seu Saldo é de R$" . number_format($this->saldo,2,',','.');
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
  

?>
