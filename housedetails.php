<html>
  <head>
  <link rel="stylesheet" href="mystyle.css">
  </head>
  <body>
    <div>
  
        <?php
            session_start();
            $conn = mysqli_connect("localhost", "root", "");
            $db = mysqli_select_db($conn, "testdb");
            $propid = $_COOKIE['boxid'];
            
        
            $sql = "SELECT * FROM PROPERTY WHERE PROPERTYID = '$propid' ";
            $query = mysqli_query($conn , $sql );
        
            while($row = mysqli_fetch_array($query)){
                echo "<div id=detail_wrap>";
                echo '<img  id="detailpic" width="100%" height="40%" src="data:image;base64,'.base64_encode($row['image']).'" alt="Image" style ="width=: 100px; height: 200px;">'; 
                echo '<div id="details">';
                echo "<h2>Address: $row[street]</h2>";
                echo "<h2>Location: $row[city] , $row[stat]</h2>";
                echo "<h2>Zipcode: $row[zipcode]</h2>";
                echo "<h2>Bedrooms: $row[bedroom]</h2>";
                echo "<h2>Bathrooms: $row[bath]</h2>";
                echo "<h2>Years: $row[years]</h2>";
                echo "<h2>Price: $row[price]</h2>";
                echo "<h2>Additional: $row[additional]</h2>";
                echo "</div>";
                echo "</div>";

            }
             echo "<form action=\"dashie.php\"><br><button >Dashboard</button> </form>";
        
        
        ?>
    </div>
  </body>
</html>