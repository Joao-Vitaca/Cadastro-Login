<?php
class conta{

    private static $conn;
    
    static function setConn($conn){
        self::$conn = $conn;
    }

    static function entrar($email, $senha){
        $sql = "Select email, senha from clientes where email = ?;";
        $res = self::$conn->prepare($sql);
    
        $res->execute([$email]);
        
        $res = $res->fetch(PDO::FETCH_ASSOC);

        if($res!=null){ 
            if($res['senha'] == $senha){
                self::$conn = null;
                return "Entrou com sucesso!";
            }else{
                self::$conn = null;
                return "Senha inválida!";
            }
        }
                
        self::$conn = null;
        return "Conta inexistente, crie uma conta antes!";
    }

    static function cadastrar($nome, $email, $senha){
        $sql = "Select email from clientes where email = ?;";
        $res = self::$conn->prepare($sql);

        $res->execute([$email]);

        $res = $res->fetch(PDO::FETCH_ASSOC);

        if($res!=null){
            self::$conn = null;
            return "Email já cadastrado!";  
        }

        $sql = "insert into clientes values (null,?,?,?)";
        $res = self::$conn->prepare($sql);

        $res->execute([$nome,$email,$senha]);
        self::$conn = null;
        return "Cadastrou com sucesso!";
    }

    static function mudar_Senha($email, $senha, $novaSenha){
        $sql = "Select email, senha from clientes where email = ?;";
        
        $res = self::$conn->prepare($sql);

        $res->execute([$email]);

        $res = $res->fetch(PDO::FETCH_ASSOC);

        if($res!=null){ 
            if($res['senha'] == $senha){
                $sql = "update clientes set senha = ? where email = ?";
                $res = self::$conn->prepare($sql);

                $res->execute([$novaSenha,$email]);

                self::$conn = null;
                return "Senha trocada com sucesso!";
            }else{
                self::$conn = null;
                return "Senha inválida!";
            }
        }
        self::$conn = null;
        return "Conta inexistente, crie uma conta antes!";
    }

    static function deletar($email, $senha){
        $sql = "Select email, senha from clientes where email = ?;";

        $res = self::$conn->prepare($sql);

        $res->execute([$email]);

        $res = $res->fetch(PDO::FETCH_ASSOC);

        if($res!=null){ 
            if($res['senha'] == $senha){
                $sql = "delete from clientes where email = ?";
                $res = self::$conn->prepare($sql);

                $res->execute([$email]);

                self::$conn = null;
                return "Conta deletada com sucesso!";
            }else{
                self::$conn = null;
               return "Senha inválida!";
            }
        }
        self::$conn = null;
        return "Conta inexistente, crie uma conta antes!";
    
    }
}