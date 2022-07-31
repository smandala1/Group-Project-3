<html>
  <head>
    <title>Form in PHP / MySQL</title>
    <link rel="stylesheet" href="mystyle.css">
  </head>
  <body>
    <div id=header>
        <h1>Seller Dashboard</h1> <h4><a href="project3login.php">Logout<a></h4>
    </div>
    <div >
      
      <img  width=30px class="plus" src="add.png"><span>Add Property</span>
      
     </div>
    <div id=welcomemessage>
    <?php
    session_start();
/*
    echo"<pre>";
    print_r($_POST);
    echo"</pre>";
*/
if(!isset($_SESSION['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    include("retrievefromdb.php");
    Retreive($username);

     if(isset($_SESSION['username'])){
        echo "<br><h3>Hello ".$_SESSION['username']." Welcome Back! </h3>";
        $_SESSION['loggedin'] = 'yes';
     }else{
      die();
     }

    }else{
      echo "<br><h3>Hello ".$_SESSION['username']." Welcome Back!</h3>";
    }
    ?>
    </div>
    <br>
   
    <?php
    
    $username = $_SESSION['username'];

    $conn = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($conn, "testdb");

    $sql = "SELECT * FROM PROPERTY WHERE USERNAME = '$username' ";
    $query = mysqli_query($conn , $sql );
    $i = 1;
    while($row = mysqli_fetch_array($query)){
          
            if($i%3 == 1){
            echo '<div id='.$row['propertyid'].' class="div2 prop">';
            echo '<img class="cardimg" src="data:image;base64,'.base64_encode($row['image']).'" alt="Image" style ="width=: 100px; height: 200px;">';
            echo  'Address:'. $row['street']."<br/><br/>";
            echo  'ZipCode: '.$row['zipcode']."<br/><br/>";
            echo  'Bedrooms: '.$row['bedroom']."<br/><br/>";
            echo  'Bath: '.$row['bath']."<br/><br/>";
            echo  'Price: '.$row['price']."<br/><br/>";          
            echo '</div>';
            $i = $i + 1;
            }else if($i%3 == 2){
              echo '<div id='.$row['propertyid'].' class="div1 prop">';
              echo '<img class="cardimg" src="data:image;base64,'.base64_encode($row['image']).'" alt="Image" style ="width=: 100px; height: 200px;">';
              echo  'Address:'. $row['street']."<br/><br/>";
              echo  'ZipCode: '.$row['zipcode']."<br/><br/>";
              echo  'Bedrooms: '.$row['bedroom']."<br/><br/>";
              echo  'Bath: '.$row['bath']."<br/><br/>";
              echo  'Price: '.$row['price']."<br/><br/>";          
              echo '</div>';
              $i = $i + 1;
            }else if($i%3 == 0){
              echo '<div id='.$row['propertyid'].' class="div3 prop">';
              echo '<img class="cardimg" src="data:image;base64,'.base64_encode($row['image']).'" alt="Image" style ="width=: 100px; height: 200px;">';
              echo  'Address:'. $row['street']."<br/><br/>";
              echo  'ZipCode: '.$row['zipcode']."<br/><br/>";
              echo  'Bedrooms: '.$row['bedroom']."<br/><br/>";
              echo  'Bath: '.$row['bath']."<br/><br/>";
              echo  'Price: '.$row['price']."<br/><br/>";          
              echo '</div>';
              $i = $i + 1;
            } 
      
            
    }

?>


        <script>
        const addproperty = document.querySelector(".plus")
        addproperty.addEventListener('click', e => {
          location.href = "uploadproperty.php" });

        const boxes = document.querySelectorAll(".prop")
          
        for (const box of boxes) {
          box.addEventListener('click', function handleClick(event) {
           console.log('box clicked', event);
           console.log(box.id);
           let status = box.id;
           document.cookie= 'boxid =' + status;
           location.href = "housedetails.php";
          });
    }

        </script>

  </body>
</html>