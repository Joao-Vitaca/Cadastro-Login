<?php

class conexao{
    
    private $db;
    private $host;
    private $user;
    private $pass;

    function __construct($bd, $host,$user, $pass){
        $this->db=$bd;
        $this->host=$host;
        $this->user=$user;       
        $this->pass=$pass;
    }

    function conectar(){
        try{
            $conn = new PDO("mysql:dbname={$this->db};localhost={$this->host}",$this->user, $this->pass);
            if(!$conn){
                throw new PDOException("Erro ao conectar com o banco de dados!");
            }   
        }catch(PDOException $e){
            echo $e->getMessage();
        }

        return $conn;
    }

}