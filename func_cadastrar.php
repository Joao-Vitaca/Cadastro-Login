<?php
    function cadastrar($nome, $email, $senha){
        global $bd, $host, $user, $pass;

        $pdo = new PDO("mysql:dbname={$bd};host={$host}", $user, $pass);

        $sql = $pdo->prepare("Select email from clientes where email = ?;");

        $sql->execute([$email]);

        $sql = $sql->fetch(PDO::FETCH_ASSOC);

        if($sql!=null){
            $pdo = null;
            return "Email já cadastrado!";  
        }

        $sql = $pdo->prepare("insert into clientes values (null,?,?,?)");

        $sql->execute([$nome,$email,$senha]);
        $pdo = null;
        return "Cadastrou com sucesso!";    
    }