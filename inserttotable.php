<?php
function Insert($fname, $lname, $email, $username,$password){
    $host = "localhost";
	$user = "mmccain3";
	$pass = "mmccain3";
	$dbname = "mmccain3";

	//create connection 
	$conn = mysqli_connect($host, $user, $pass, $dbname);

    	//check connection 
	if ($conn-> connect_error){
		echo "COuld not connect to Server\n";
		die("Connection failed: " .  $conn->$connect_error);
	}
	else {
		echo "<br>Connection Established\n";
	}
    $password = md5($password);
    $sqli = "INSERT INTO PRIMARYUSERS (fname, lname, email, username, password) VALUES ('$fname', '$lname', '$email', '$username' , '$password' )";
    try {
        $conn -> query($sqli);
        
    } catch (\Throwable $th) {
       echo "<br>This Username or Email Already Exists Go back and Try again";
       die();
    }

    echo "<br>User Successfully Registered Go Back To Login";
    echo "<form action=\"project3login.php\"><br><button >Login</button> </form>";
}
?>