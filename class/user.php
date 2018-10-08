<?php

class User{
    private $_pdo, $_query, $_username;
    public function __construct($username = null){
        //!Zapravo _pdo = new DB(); 
        $this->_pdo = DB::getInstance();
        $this->_query = $this->_pdo -> query("users");
        if($username){
            //specifični user
            while($row = $this->_query -> fetch()){
                if($row['username'] == $username || $row['mail'] == $username){
                    $this->_id = $row['id'];
                    $this->_username = $row['username'];
                    $this->_mail = $row['mail'];
                    $this->_name = $row['name'];
                    $this->_surname = $row['surname'];
                    $this->_phone = $row['phone'];
                    $this->_admin = $row['admin'];
                    $this->_moderator = $row['moderator'];
                    $this->_image = $row['image'];
                }
            }
            
        }else{
            //konstruktor na globalnom nivou
            
        }
    }
    
    public function login($username, $psw){
        while ($row = $this->_query -> fetch()){
            if($row['username'] == $username && $row['password'] == $psw){
                $this->_id = $row['id'];
                $this->_username = $row['username'];
                $this->_mail = $row['mail'];
                $this->_name = $row['name'];
                $this->_surname = $row['surname'];
                $this->_phone = $row['phone'];
                Session::setUsername($username);
                exit(header("Location: admin/index.php"));
            }else{
                //exit(header("Location: /login.php"));
            }
        }
        exit(header("Location: login.php"));
        
    }
    
    public function nameAndSurname(){
        return $this->_name.' '.$this->_surname;
    }
    public function username(){
        return $this->_username;
    }
    public function updateImage($image, $id){
        $update = "UPDATE `users` SET `image` = '{$image}' WHERE id = $id";
        $this->_pdo->insert($update);
    }
    public function writeAllUsers(){
        $this->_query = ($this->_pdo ->query("users"));
        while($row = $this->_query -> fetch()){
            echo $row['name'].'<br>';
        }
    }
    
    public function registerUser($name, $prezime, $mail, $sifra, $telefon){
        $examp = explode("@", $mail);
        $username = $examp[0];
        $register = "INSERT INTO `users`(`name`,`surname`,`mail`,`username`,`password`,`phone`) 
                     VALUES ('{$name}','{$prezime}','{$mail}','{$username}','{$sifra}','{$telefon}')";
        $this->_pdo->insert($register);
        Redirect::to('index.php');
    }
    public function isAdmin(){
        if($this->_admin) return true;
        return false;
    }
    public function isModerator(){
        if($this->_moderator) return true;
        return false;
    }
    public function id(){
        return $this->_id;
    }
    public function image(){
        return $this->_image;
    }
}

class Photo{
    public $_pdo, $_query;
    public function __construct(){
        $this->_pdo = DB::getInstance();
        $this->_query = $this->_pdo -> query("slider");
    }

    public function insert($name){
        $insert = "INSERT INTO `slider` (`name`) VALUES ('{$name}')";
        $this->_pdo -> insert($insert);
    }

    public function delete($name){
        $delete = "DELETE FROM `slider` WHERE name = '{$name}'";
        $this->_pdo->action($delete);
        $path = 'images/'.$name;
        unlink($path);
    }
}