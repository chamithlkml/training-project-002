<?php
use namefeeder\Database;

# Single include
require_once(realpath(__DIR__) .DIRECTORY_SEPARATOR.'..'. DIRECTORY_SEPARATOR . 'php'. DIRECTORY_SEPARATOR . 'inc.php');

# OOP Class(Properties, methods) --> Object
$database = new Database(DB_HOST, DB, USER, PASSWORD);


//  sign up 
if(isset($_POST['submit'])){

    $first_name=input_varify( $_POST['fname']);
    $last_name=input_varify( $_POST['lname']);
    $email=input_varify( $_POST['nemail']);
    $birthday=$_POST['bdate'];
    $password=protect_password( $_POST['npass']);

    if ($database->getUserByEmail($email))
    {
 
        if ($database->createUser($first_name, $last_name,$email,$birthday,$password))
        {
            echo "Detail inserted sucsessfuly";
         }else{
            echo "Error in registration";
         };
    }else{
        echo "Allready registerd Email Address ";
    };
}
//sign in
if(isset($_POST['signin'])){

    $email=input_varify( $_POST['emailLogin']);
    $password=protect_password( $_POST['passLogin']);

    if ($database->sign_in($email,$password))
    {
        echo "Login sucsessfuly";
       
    }else{
        echo "Email or Username Invalid";
    };
}
//input data check
function input_varify($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data); 
    return $data;
}
function protect_password($data){
    $data = md5($data);
    return $data;
}

?>