<?php
function Retreive($username){
    $host = "localhost";
	$user = "mmccain3";
	$pass = "mmccain3";
	$dbname = "mmccain3";

    $password = md5($_POST['password']);
    $username = trim($_POST['username']);


	//create connection 
	$conn = mysqli_connect($host, $user, $pass, $dbname);

    $sql = "SELECT COUNT(*) FROM PRIMARYUSERS WHERE USERNAME = '$username' AND PASSWORD = '$password'";
    
    $result = $conn -> query($sql);
    $rs = mysqli_fetch_assoc($result);
   

    //echo"<pre>";
    //print_r($rs);
    //echo"</pre>";

    if ($rs['COUNT(*)'] > 0) 
    {
       //echo "<br>USER FOUND";
       $_SESSION['username'] = $_POST['username'];
       

        }else{
            echo "<h1>User Credentials Not Found Click Below To Return To Login Screen</h1>";
             echo "<form action=\"project3login.php\"><br><button >Login</button> </form>";
            
        }   
    

}
?>