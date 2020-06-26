<?php

class Fabricante{
    private $nome;

    public function __construct($nome)
    {
        $this->nome = $nome;
    }
    public function getNome(){
        return $this->nome;
    }
}

class Produto{

    private $descricao;
    private $preco;
    private $fabricante;

    public function __construct($descricao, $preco, Fabricante $fabricante){
        $this->descricao = $descricao;
        $this->preco = $preco;
        $this->fabricante = $fabricante;
        echo "Objeto criado!";
    }

    public function getDetalhes(){
        return "O produto {$this->descricao} custa {$this->preco}. Fabricante: {$this->fabricante->getNome()}";
    }

    public function setDescricao($valor){
        $this->descricao = $valor;
    }

    public function setPreco($valor){
        $this->preco = $valor;
    }

    public function setFabricante($valor){
        $this->fabricante = $valor;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function getPreco(){
        return $this->descricao;
    }

    public function getFabricante(){
        return $this->fabricante;
    } 

}

$f1 = new Fabricante('Vagner Pirovaldinei');
$p1 = new Produto('Livro', 40.00, $f1);
// var_dump($p1);
echo $p1->getDetalhes();

?>