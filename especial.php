<?php

require('conta.php');


/**
 * Classe responsavel por criar a conta especially
 * @param 1 int nuero da agenci
 * @param 2 decimal num da agencia
 * @param 3 password da conta
 */
class Especial extends Conta{
  
  private $limite = 0;

  public function setLimite($valor){
    $this->limite = $valor;
  }

  /**
   * Função que retorna o limite da conta
   * @access public
   * @return mensagem do limite
   */
  public function getLimite(){
    echo "\nSeu Limite é de R$" . number_format($this->limite,2,',','.');
  }

  public function getSaldo(){
    if($this->logado == true){
      echo "\nSeu Saldo é de R$" . number_format($this->saldo+$this->limite,2,',','.');
    }
  }

  /**
   * Função responsavel por realiza o saque
   * compara se o valor do saque é maior do que o valor do 
   * saldo mais o limite da conta
   * ela compara se o valor solicitado é maior do que 
   * o valor do saldo
   * 
   * @param int valor
   * @return mensagem do saque realizado
   */
  public function saque($valor){
    if($this->logado == true){
      if($valor <= ($this->saldo + $this->limite)){
        if($valor >= $this->saldo){
          echo "\nCuidado! Você entro no limite esprecial\n\n";
        }
      $this->saldo = $this->saldo - $valor;
      $this->setExtrato('saque', $valor);
      // echo "saldo: R$" . $this->saldo."\n";
      }else{
        echo "\nO valor solicitado é maior do que Saldo + Limite ";
      }
    }
  }
  //responsavel pelo deposito na conta
  public function deposito($valor){
    if($this->logado == true){
      $this->saldo = $this->saldo + $valor;
      $this->setExtrato('deposito', $valor);
      // echo "saldo: R$" .$this->saldo."\n";
    } 
  }
  //responsavel pelo acesso da conta bancaria
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
  }
  