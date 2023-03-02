<?php include_once('conn.php') ?>
<?php

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
    $password=input_varify( $_POST['npass']);

    //echo $first_name;
   // echo "<br>";
    //echo $last_name;
   // echo "<br>";
    //echo $email;
   // echo "<br>";
    //echo $birthday;
    //echo "<br>";
    //echo $password;
   // echo "<br>";

    if (insertDetails($con, $first_name, $last_name,$email,$birthday,$password))
    {
        echo "Detail inserted sucsessfuly";
       
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

function input_varify($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data); 
    return $data;
}

?>