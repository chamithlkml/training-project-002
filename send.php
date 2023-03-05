<?php
use namefeeder\Database;

# Single include
require_once(realpath(__DIR__) . DIRECTORY_SEPARATOR . 'php' . DIRECTORY_SEPARATOR . 'inc.php');
# OOP Class(Properties, methods) --> Object
$database = new Database(DB, USER, PASSWORD);
# Public property
// echo $database->db_type .  "\n";

// $database->getUserByEmail();
$database->getUserByEmail('someuser@email.com'); die;

#private property
// echo $database->db_name . "\n";die;

#protected property
// echo $database->sample . "\n";

if(isset($_POST['submit'])){

    $con = config::connect();

   

    $first_name="";
    $last_name = "";
    $email = "";
    $birthday ="";
    $password ="";

    $first_name=input_varify( $_POST['fname']);
    $last_name=input_varify( $_POST['lname']);
    $email=input_varify( $_POST['nemail']);
    $birthday=$_POST['bdate'];
    $password=protect_password( $_POST['npass']);

    if (check_existing_email($con,$email))
    {
        if (insertDetails($con, $first_name, $last_name,$email,$birthday,$password))
        {
            echo "Detail inserted sucsessfuly";
        }else{
            echo "Error in registration";
        };
    }else{
        echo "Allready registerd Email Address ";
    };
}

if(isset($_POST['signin'])){

    $con = config::connect();

    $email = "";
    $password ="";

    $email=input_varify( $_POST['emailLogin']);
    $password=protect_password( $_POST['passLogin']);

    if (login_details($con,$email,$password))
    {
        echo "Login sucsessfuly";
       
    }else{
        echo "Email or Username Invalid";
    };
}

function insertDetails($con, $first_name, $last_name,$email,$birthday,$password)
{

    $query = $con->prepare("
    
        INSERT INTO users (first_name,last_name,email,birthday,pass)
        VALUES(:first_name_v,:last_name_v,:email_v,:birthday_v,:pass_v)
    
    ");

    $query -> bindParam(":first_name_v",$first_name);
    $query -> bindParam(":last_name_v",$last_name);
    $query -> bindParam(":email_v",$email);
    $query -> bindParam(":birthday_v",$birthday);
    $query -> bindParam(":pass_v",$password);

    return $query->execute();
}

function login_details($con,$email,$password)
{

    $query = $con->prepare("
    
        SELECT * FROM users WHERE email=:email_v AND pass=:pass_v
    
    ");

    $query -> bindParam(":email_v",$email);
    $query -> bindParam(":pass_v",$password);
    $query->execute();

    if ($query->rowCount()==1)
    {
        return true;
    }else{
        return false;
    }
}

function check_existing_email($con,$email)
{

    $query = $con->prepare("
    
        SELECT * FROM users WHERE email=:email_v 
    
    ");

    $query -> bindParam(":email_v",$email);
    $query->execute();

    if ($query->rowCount()==0)
    {
        return true;
    }else{
        return false;
    }
}

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