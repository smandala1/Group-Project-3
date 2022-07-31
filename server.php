<?php

	session_start();
	
	$loc8ion = " ";		// USER'S LOCATION DATA
	$floorPln = " ";	// USER'S SQUARE FTG DATA
	$noOFbeds = " ";	// USER'S NO. OF BEDRS DATA
	$noOFbafs = " ";	// USER'S NO. OF BATHS DATA
	$gardYorN =	"false";// USER'S GARDEN BOOLEAN
	$prknYorN = "false";// USER'S PARKING BOOLEAN
	$proxFclt = " ";	// USER'S FACILITY PROXIMITY DATA
	$proxRoad = " ";	// USER'S ROAD PROXIMITY DATA
	$propTax = " ";		// USER'S PROP TAX DATA
	
	$errors = array();
	
	//database connection
	
	$dataB = mysql_connect('localhost','root', '', 'propdata');
	
	
//new property listing
	if (isset($_POST['nuLstn'])){
		$loc8ion = mysql_real_escape_string($dataB, $_POST['loc8ion']);
		$floorPln = mysql_real_escape_string($dataB, $_POST['floorPln']);
		$noOFbeds = mysql_real_escape_string($dataB, $_POST['noOFbeds']);
		$noOFbafs = mysql_real_escape_string($dataB, $_POST['noOFbafs']);
		$proxFclt = mysql_real_escape_string($dataB, $_POST['proxFclt']);
		$proxRoad = mysql_real_escape_string($dataB, $_POST['proxRoad']);
		$propTax = mysql_real_escape_string($dataB, $_POST['propTax']);
		
		if (isset($_POST['garden'])) {$gardYorN = true;}  //checks to see if "Garden?" box was checked
		if (isset($_POST['paahkin'])) {$prknYorN = true;} //checks to see if "Parking" box was checked
		
	if($dataB -> connect_error){ die("Connection failed: " . $dataB -> connect_error);}
		
		//empty field checking
		
		if (empty($loc8ion)) {array_push($errors, "Location not specified.");}
		if (empty($floorPln)) {array_push($errors, "Square footage not specified.");}
		if (empty($noOFbeds)) {array_push($errors, "Number of bedrooms not specified.");}
		if (empty($noOFbafs)) {array_push($errors, "Number of bathrooms not specified.");}
		if (empty($proxFclt)) {array_push($errors, "Facilities nearby not specified.");}
		if (empty($proxRoad)) {array_push($errors, "Major roads nearby not specified.");}
		if (empty($propTax)) {array_push($errors, "Property tax information not specified.");}
		
		}
		if (count($errors) == 0){ 
		$sql = "INSERT INTO propdata (location,sqrftg,numbeds,numbafs,gardyorn,paahkin,facprox,rodprox,proptax) 
				VALUES ('$loc8ion','$floorPln','$noOFbeds','$noOFbafs','$gardYorN','$prknYorN','$proxFclt','$proxRoad','$propTax')";
		if ($dataB ->query($sql) === TRUE) {
			echo "alert('New record created successfully')";
			} else {
			echo "Error: " . $sql . "<br>" . $dataB->error;
			}
		}
		$dataB ->close();
?>