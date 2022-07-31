
<?php

function connectdb() {
	$host = "localhost";
	$user = "root";
	$pass = "";
	$dbname = "testdb";

	//create connection 
		$conn = mysqli_connect($host, $user, $pass, $dbname);

	//check connection 
	if ($conn-> connect_error){
		echo "COuld not connect to Server\n";
		die("Connection failed: " .  $conn->$connect_error);
	}
	else {
		//echo "Connection Established\n";
	}


$sqli = "CREATE TABLE IF NOT EXISTS PRIMARYUSERS (
    id int(11) UNSIGNED  PRIMARY KEY NOT NULL AUTO_INCREMENT,
    fname varchar(120) NOT NULL,
    lname varchar(120) NOT NULL,
    email varchar(120) NOT NULL UNIQUE,
    username varchar(120) NOT NULL UNIQUE,
	password varchar(120) NOT NULL
)";

$sqli2 = "CREATE TABLE IF NOT EXISTS PROPERTY (
	propertyid int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    city varchar(120) NOT NULL,
	stat varchar(120) NOT NULL,
	zipcode int(11) NOT NULL,
    years int(11) NOT NULL,
    bedroom varchar(120) NOT NULL,
    bath  int(11) NOT NULL,
    additional varchar(120) NOT NULL,
	username varchar(120) NOT NULL,
	image BLOB NOT NULL,
	price varchar(120) NOT NULL,
	street varchar(120) NOT NULL
)";

  if($conn -> query($sqli) === TRUE){
	//echo "<br>Table Created";
  }else{
	echo "Error: ".$conn->error;
  }

  
  if($conn -> query($sqli2) === TRUE){
	//echo "<br>Table Created";
  }else{
	echo "Error: ".$conn->error;
  }
  

}
?>
