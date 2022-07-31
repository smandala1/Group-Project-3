<?php
session_start();

//script to t
include("mysqli_connection_script.php");
include("inserttotable.php");

// Check if request comes from a form
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    connectdb();
   
    //User entry
    $fname = $_POST["fname"]; 
    $lname = $_POST["lname"]; 
    $email = $_POST["email"];
    $username = $_POST["username"];
    $pass = $_POST["password"]; 
    $v_pass = $_POST["confirm_password"]; 
    
    $string = "";
   
    if (strlen($fname) == 0){
      $string .= "<br>"."Please enter your first name\n";
    }
    if (strlen($lname) == 0){
        $string .= "<br>"."Please enter your last name";
       
    }
    if (strlen($email) == 0 ||  !filter_var($email, FILTER_VALIDATE_EMAIL)){
        $string .= ("<br>"."Please enter your email\n");
      
      }
      if (strlen($username) == 0){
        $string .= ("<br>"."Please enter your username");
  
      }
      if (strlen($pass) == 0){
        $string .= ("<br>"."Please enter your password");

      }
      if ($pass != $v_pass ){
        $string .= ("<br>"."Passwords Do Not Match");
      }
       
        if(strlen($string) > 0){
            die($string."<form action=\"projectregistrationform.php\"><br><button >Go Back</button> </form>" );
          
            
        }   


    Insert($fname, $lname, $email, $username,$pass);
    echo "User Successfully Registered Go Back To Login";
    echo "<form action=\"project3login.php\"><br><button >Login </button> </form>";
  
}
    
?>

