<?php
namespace Model;
  
use Model\Connection;

use PDO;
use PDOException;

class User{
    private $db;

    public function __construct(){
        $this -> db = Connection::getInstance();
    }

    // FUNÇÃO PARA REGISTRAR USUÁRIO
    public function registerUser($user_fullname, $email, $password, $institution, $ip) {
        try{
            $sql = 'INSERT INTO user (user_fullname, email, password, institution, ip, created_at) VALUES(:user_fullname, :email, :password, :institution, :ip, NOW())';
            
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $this -> db -> prepare($sql);

            $stmt -> bindParam(":user_fullname", $user_fullname, PDO::PARAM_STR);
            $stmt -> bindParam(":email", $email, PDO::PARAM_STR);
            $stmt -> bindParam(":password", $hashedPassword, PDO::PARAM_STR);
            $stmt -> bindParam(":institution", $institution, PDO::PARAM_STR);
            $stmt -> bindParam(":ip", $ip, PDO::PARAM_INT);

            return $stmt -> execute();

        } catch(PDOException $error){
            echo "Erro ao executar o comando: " . $error -> getMessage();
            return false;
        }
    }

    // FUNÇÃO PARA LOGIN
    public function getUser_Email($email){
        try{
            $sql = "SELECT * FROM user WHERE email = :email LIMIT 1";

            $stmt = $this -> db -> prepare($sql);

            $stmt -> bindParam(":email", $email, PDO::PARAM_STR);

            $stmt -> execute();

            return $stmt -> fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $error){
            echo "Erro ao buscar informações do usuário: " . $error -> getMessage();
        }
    }

    public function getUserInfo($id, $user_fullname, $email){
        try{
            $sql = "SELECT user_fullname, email FROM user WHERE id = :id AND user_fullname = :user_fullname AND email = :email";

            $stmt = $this -> db -> prepare($sql);

            $stmt -> bindParam(":id", $id, PDO::PARAM_INT);
            $stmt -> bindParam(":user_fullname", $user_fullname, PDO::PARAM_STR);
            $stmt -> bindParam(":email", $email, PDO::PARAM_STR);

            $stmt -> execute();

            return $stmt -> fetch (PDO::FETCH_ASSOC);
            
        } catch(PDOException $error) {
            echo "Erro ao buscar informações: " . $error-> getMessage();
            return false;
        }
}
}
?>