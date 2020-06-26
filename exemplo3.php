<?php


//final é para uma classe não ser extendida nunca, ngm pode herdá-la


abstract class Conta{  //faz a classe não ser criada como objeto, assim ela se torna estrutural, somente para ser base a outras classes child
    protected $agencia;
    protected $conta;
    protected $saldo;

    public function __construct($agencia, $conta, $saldo){
        $this->agencia = $agencia;
        $this->conta = $conta;
        $this->saldo = $saldo;
    }
    public function getDetalhes(){
        return "Agência: {$this->agencia} | Conta: {$this->conta} | Saldo: {$this->saldo}";
    }
    public function depositar($valor){
        $this->saldo += $valor;
        echo "Depósito de: {$valor}  |   Saldo atual: {$this->saldo}<br/>";
    }
}

final class Poupanca extends Conta{
    public function saque($valor){
        if($this->saldo >= $valor):
            $this->saldo -= $valor;
            echo "Saque de {$valor}  |  Saldo atual: {$this->saldo} <br />";
        else:
            echo "Saque não autorizado  |  Saldo atual: {$this->saldo}<br/>";
        endif;
    } 
}
final class Corrente extends Conta{

    protected $limite;

    public function __construct($agencia, $conta, $saldo, $limite){
        parent::__construct($agencia, $conta, $saldo);
        $this->limite = $limite;
    }

    public function saque($valor){
        if(($this->saldo + $this->limite) >= $valor):
            $this->saldo -= $valor;
            echo "Saque de {$valor}  |  Saldo atual: {$this->saldo} <br />";
        else:
            echo "Saque não autorizado  |  Saldo atual: {$this->saldo}<br/>";
        endif;
    } 
}


$c1 = new Poupanca(100, 2586, 5000);
$c1->depositar(90000);
$c1->saque(25009);
echo $c1->getDetalhes();

$cc1 = new Corrente(100, 2586, 5000, 500);
$cc1->depositar(90000);
$cc1->saque(99);
echo $cc1->getDetalhes();

?>