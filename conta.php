<?php

class Conta{
  
  public $agencia;
  public $conta;
  private $senha;
  protected $saldo;
  protected $extrato = array();
  protected $logado = false;
  
  /**
   * Documentação da Classe Conta
   * Esta classe responsavel por criar as contas no sistema
   * @autor Prof Hericson
   * @version 1.0
   * 
   * Metodo construtor recece os principais valores para
   * @param 1 int agencia
   * @param 2 decimal conta
   * @param 3 password
   */
  public function __construct($ag,$cc,$pwd){
    $this->agencia = $ag;
    $this->conta = $cc;
    $this->senha = md5($pwd);
    $this->saldo = 0;
  }

  public function __destruct(){
    echo "\nObjeto Destruído\n";
  }
  
  public function deposito($valor){
    if($this->logado == true){
      $this->saldo = $this->saldo + $valor;
      $this->setExtrato('deposito', $valor);
      // echo "saldo: R$" .$this->saldo."\n";
    }
  }

  public function saque($valor){
    if($this->logado == true){
      $this->saldo = $this->saldo - $valor;
      $this->setExtrato('saque', $valor);
      // echo "saldo: R$" . $this->saldo."\n";
    }
  }

  protected function setExtrato($tipo, $valor){
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
  public function getExtrato(){
    if($this->logado == true){
      return $this->extrato;
    }
  }
  public function getSaldo(){
    if($this->logado == true){
      echo "Seu Saldo é de R$" . number_format($this->saldo,2,',','.');
    }
  }
}
