<?php
    function deletarConta($email, $senha){
        global $bd, $host, $user, $pass;

        $pdo = new PDO("mysql:dbname={$bd};host={$host}", $user, $pass);

        $sql = $pdo->prepare("Select email, senha from clientes where email = ?;");

        $sql->execute([$email]);

        $sql = $sql->fetch(PDO::FETCH_ASSOC);

        if($sql!=null){ 
            if($sql['senha'] == $senha){
                $sql = $pdo->prepare("delete from clientes where email = ?");

                $sql->execute([$email]);

                $pdo = null;
                return "Conta deletada com sucesso!";
            }else{
                $pdo = null;
               return "Senha inválida!";
            }
        }
        $pdo = null;
        return "Conta inexistente, crie uma conta antes!";
    }