<?php
class Users{
    public function login($data){
        session_start();
        ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
        $pdo = new PDO('mysql:host=localhost;dbname=bsit202_dedios_chatroom','root','');

        $query = 'SELECT * FROM accounts WHERE email=:email and password=:password';

        $check = $pdo->prepare($query);
        $check->bindValue('email',$data['login_email']);
        $check->bindValue('password',$data['login_password']);
        $check->execute();

        $records = $check->fetchAll();
        if(count($records) == 0){
            // Invalid
            echo 'Invalid email or Password';
        }else{
            $_SESSION['auth'] = $records;
            echo 'success';
        }
    }

    public function register($data){
        ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
        $pdo = new PDO('mysql:host=localhost;dbname=bsit202_dedios_chatroom','root','');

        $query = 'SELECT * FROM accounts WHERE email=:email';

        $check = $pdo->prepare($query);
        $check->bindValue('email',$data['email']);
        $check->execute();

        $records = $check->fetchAll();
        if(count($records) == 0){
             $query = 'INSERT INTO accounts(email,password,name) VALUES(:email,:password,:name)';
            $stmt = $pdo->prepare($query);
            $stmt->bindValue('email',$data['email']);
            $stmt->bindValue('password',$data['password']);
            $stmt->bindValue('name',$data['name']);

            $stmt->execute();

            return 'success';
        }else{
            return 'username already exist';
        }
       
    }
}