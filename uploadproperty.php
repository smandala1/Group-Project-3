<?php
    include("mysqli_connection_script.php");
    connectdb();
    session_start();
    if(isset($_POST['upload'])){
        $conn = mysqli_connect("localhost", "root", "");
        $db = mysqli_select_db($conn, "testdb");

        $image = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
        $address = $_POST['street'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zipcode = $_POST['zipcode'];
        $year = $_POST['year'];
        $beds = $_POST['beds'];
        $bath = $_POST['bath'];
        $additional  = $_POST['additional'];
        $price = $_POST['price'];
        $username = $_SESSION['username'];

        $sql = "INSERT INTO PROPERTY(city, stat, zipcode, years, bedroom, bath, additional, image, price, street, username)
            VALUE ('$city', '$state', '$zipcode', '$year', '$beds','$bath','$additional', '$image', '$price', '$address', '$username' )";
        $query = mysqli_query($conn, $sql);

        if($query){
            echo '<script type="text/javascript"> alert("Image Uploaded")</script>';
        }else{
            echo '<script type="text/javascript"> alert("Image Denied")</script>';
        }
    }    


?>

<html>
  <head>
    <title>Form in PHP / MySQL</title>
    <link rel="stylesheet" href="mystyle.css">
  </head>
  <body>
    <div>
  <?php
  if(isset($_POST['upload'])&& $_POST['city'] != ""){
    $conn = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($conn, "testdb");

    $sql = "SELECT * FROM PROPERTY WHERE USERNAME = '$username' ";
    $query = mysqli_query($conn , $sql );
    }

  
  ?>
  </div>

    <form id="registration_form" method="POST" action="uploadproperty.php" enctype="multipart/form-data">

    <label for="Street Address"> Address: </label>
    <input type="text" name="street">
    <br>

    <label for="city"> City: </label>
    <input type="text" name="city">
    <br>

    <label for="state"> State: </label>
    <input type="text" name="state">
    <br>

    <label for="zipcode"> Zipcode: </label>
    <input type="text" name="zipcode">
    <br>

    <label for="year"> Year: </label>
    <input type="text" name="year">
    <br>

    <label for="beds"> Bedroom: </label>
    <input type="text" name="beds">
    <br>

    <label for="bath"> Bath: </label>
    <input type="text" name="bath">
    <br>

    <label for="price"> Price: </label>
    <input type="text" name="price">
    <br>


    <label for="additional"> Additional: </label>
    <textarea name="additional" cols="40" rows="5" placeholder="Additional Information">
    
    </textarea>
    <br>
    <label for="image"> Image: </label>
    <input type="file" name="image">
    <br>
    <br>
    <input type="submit" name="upload" value="Upload Form">
    </form>

    <a href="dashie.php"><button value="Go Back">Dashboard</button></a>
  </body>
</html>