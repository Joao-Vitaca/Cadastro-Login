<?php

    require_once "conexao_pdo.php";
    require_once "conta.php";

    $nome = $_POST['user']??null;
    $email = $_POST['email']??null;
    $senha = $_POST['pass']??null;
    $novaSenha = $_POST['newPass']??null;
    $deletar = $_POST['deletar']??null;

    $conexao = new conexao("banco","localhost","root","");

    conta::setConn($conexao->conectar());

    if($nome != null){
        echo conta::cadastrar($nome, $email, $senha);
    }else if($novaSenha != null){
        echo conta::mudar_Senha($email, $senha, $novaSenha);
    }else if($deletar != null){
        echo conta::deletar($email, $senha);
    }else{
        echo conta::entrar($email, $senha);
    }