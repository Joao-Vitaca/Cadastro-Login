<?php
    function mudarSenha($email, $senha, $novaSenha){
        global $bd, $host, $user, $pass;

        $pdo = new PDO("mysql:dbname={$bd};host={$host}", $user, $pass);

        $sql = $pdo->prepare("Select email, senha from clientes where email = ?;");

        $sql->execute([$email]);

        $sql = $sql->fetch(PDO::FETCH_ASSOC);

        if($sql!=null){ 
            if($sql['senha'] == $senha){
                $sql = $pdo->prepare("update clientes set senha = ? where email = ?");

                $sql->execute([$novaSenha,$email]);

                $pdo = null;
                return "Senha trocada com sucesso!";
            }else{
                $pdo = null;
                return "Senha inválida!";
            }
        }
        $pdo = null;
        return "Conta inexistente, crie uma conta antes!";
    }