<?php

class DatabaseOperation{

    private $con;

    function __construct(){

        require_once dirname(__FILE__).'/DatabaseConnect.php';

        $database = new DatabaseConnect();

        $this->con = $database->connect();
    }

   function createUser($fullname, $email, $userpassword, $phonenumber){

    $password = md5($userpassword);
    $stmt = $this->con->prepare("INSERT INTO `signup` (`Id`, `fullname`, `email`, `password`, `phonenumber`) VALUES (NULL, '?', '?', '?', '?');");

    $stmt ->bind_param("ssss",$fullname,$email,$password,$phonenumber);

    if($stmt->execute()){
        return true;
    } else{

        return false;
    }


   }
}