<html>
  <head>
    <title>Form in PHP / MySQL</title>
    <link rel="stylesheet" href="mystyle.css">
  </head>
  <body>
    <?php
    session_start();
    session_destroy();
    session_start();

    include("mysqli_connection_script.php");
    connectdb();
    ?>
    <form name="login" method="POST" action="dashie.php">
    <div id=registration_form>
     <label for="username">Username: </label>
     <input type="text" name="username" placeholder="Username" /><br />
     <label for="password">Password: </label>   
     <input type="password" name="password" placeholder="Password" /><br />
     </form>
     <div class="buttonbox">
    <form action="projectregistrationform.php">
     <button type=submit>Register</button>
    </form>
    <button type="submit" value="submit" for="login">Login</button>
    </div>
    </div>

    
      
  </body>
</html>