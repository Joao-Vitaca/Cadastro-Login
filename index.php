<?php

    require_once "conexao_mysql.php";
    require_once "func_entrar.php";
    require_once "func_cadastrar.php";
    require_once "func_mudar_Senha.php";
    require_once "func_deletar_conta.php";

    $nome = $_POST['user']??null;
    $email = $_POST['email']??null;
    $senha = $_POST['pass']??null;
    $novaSenha = $_POST['newPass']??null;
    $deletar = $_POST['deletar']??null;

    if($nome != null){
        echo cadastrar($nome, $email, $senha);
        
    }else if($novaSenha != null){
        echo mudarSenha($email, $senha, $novaSenha);
    }else if($deletar != null){
        echo deletarConta($email, $senha);
    }else{
        echo entrar($email, $senha);
    }