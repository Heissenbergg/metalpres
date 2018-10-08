<?php
session_start();
error_reporting(E_ALL);

class Redirect{
    public static function to($location=null){
		if($location){
			header('Location: ' .$location);
			exit();
		}
	}
}

class Input {
	public static function get($item){
		if(isset($_POST[$item])){
			return $_POST[$item];
		}else if(isset($_GET[$item])){
			return $_GET[$item];
		}
	}
}


class Session{
    private $_username;
    
    public static function setUsername($username){
        if(!isset($_SESSION['username'])){
            $_SESSION['username'] = $username;
            return true;
        } return false;
    }
    public static function getUsername(){
        if(isset($_SESSION['username'])) return $_SESSION['username'];
        return false;
    }
    public function existUsername(){
        return (isset($_SESSION['username'])) ? true : false;
    }
    
}


class Cookie{
    //Will be done :D
}


class DB{
    private static $_instance = null;
    private $_pdo, $_query;
    public  function __construct(){
        try{
            $this->_pdo = new PDO('mysql:host=localhost;dbname=metalpres','root','');
        }catch(PDOException $e){
            echo $e;
        }
    }

    public static function getInstance(){
        if(!isset(self::$_instance)){
            self::$_instance = new DB();
        }
        return self::$_instance;
    }
    
    public function query($table){
        return $this->_pdo ->query("SELECT * FROM ". $table); 
    }
    public function querySpecific($table, $id){
        return $this->_pdo ->query("SELECT * FROM ". $table." WHERE id = ".$id); 
    }
    public function DESCquery($table){
        return $this->_pdo ->query("SELECT * FROM ". $table." ORDER BY ID DESC"); 
    }
    public function DESCCustonQuery($table, $order){
        return $this->_pdo ->query("SELECT * FROM ". $table." ORDER BY ".$order." DESC");
    }
    public function insert($insert){
        $this->_pdo->query($insert);
    }

    public function action($action){
        $this->_pdo->query($action);
    }
}




class Date{
    public $_pdo, $_query, $_day=null, $_month=null, $_year=null, $_numberOfViews;
    public function __construct($day = null, $month = null, $year = null){
        $this->_pdo = DB::getInstance();
        if($day == null) return;
        $this->_query = $this->_pdo -> query("views");
        while($dayy = $this->_query -> fetch()){
            if($dayy['day'] == $day and $dayy['month'] == $month and $dayy['year'] == $year){
                $this->_day = $day;
                $this->_month = $month;
                $this->_year = $year;
                $this->_numberOfViews = $dayy['numOfViews'];
                $this->_numberOfViews++;
                break;
            }
        }
        if(!$this->_day){
            $number = 1;
            $insert = "INSERT INTO `views`(`day`,`month`,`year`,`numOfViews`) VALUES ('{$day}','{$month}','{$year}','{$number}')";
            $this->_pdo->insert($insert);
        }else{
            $update = "UPDATE `views` SET `numOfViews` = '{$this->_numberOfViews}' WHERE day = $this->_day AND month = $this->_month ";
            $this->_pdo->insert($update);
        }
    }
    public function days($month){
        $date = array();
        $this->_query = $this->_pdo -> query("views");
        while($day = $this->_query -> fetch()){
            if($day['month'] == $month){
                array_push($date, $day['day'], $day['numOfViews']);
            }
        }
        return $date;
    }

    public function numOfViews(){
        $views = 0;
        $this->_query = $this->_pdo -> query("views");
        while($view = $this->_query -> fetch()){
            $views += $view['numOfViews'];
        }
        return $views;
    }

}
