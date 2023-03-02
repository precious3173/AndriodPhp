<?php

require_once(realpath(dirname(__FILE__) . '/../DatabaseOperations.php'));
$response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){

    if(
        isset($_POST['fullname']) and
        isset($_POST['email']) and
        isset($_POST['password']) and
        isset($_POST['phonenumber'])
        
        ) {

       $database = new DatabaseOperation();

      if( $database->createUser($_POST['fullname'],
       $_POST['email'], $_POST['userpassword'], $_POST['phonenumber'])
      ){
        $response['error'] = false;
        $response['message'] = "Registration Successful";
      } else{
          $response['error'] = true;
          $response['message'] = "Registration Unsuccessful";
      }


    }else{
        $response['error'] = true;
        $response['message'] = "Some fields are empty";

    }
}else{
    $response['error'] = true;
    $response['message'] = "Unable to process Request";

}
echo json_encode($response);