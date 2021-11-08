<?php 
class Usuario {
    private $id;
    private $nome;
    private $sobrenome;
    private $idade ;
    private $sexo ;


//Recebe a informação (set)
    function setId($id){
        $this->id = $id; 
    }
    function setNome($nome){
        $this->nome = $nome;
    }
    function setSobrenome($sobrenome){
        $this->sobrenome = $sobrenome;
    }
    function setIdade($idade){
        $this->idade = $idade;
    }
    function setSexo($sexo){
        $this->sexo = $sexo;
    }
   //Guarda a informação GET
    function getId(){
        return $this->id;
    }
    function getNome(){
        return $this->nome;
    }
    function getSobrenome(){
        return $this->sobrenome;
    }
    function getIdade(){
        return $this->idade;

    }
    function getSexo(){
        return $this->sexo;
    }
}
?>