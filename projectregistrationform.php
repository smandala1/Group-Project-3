<html>
  <head>
    <title>Form in PHP / MySQL</title>
    <link rel="stylesheet" href="mystyle.css">
  </head>
  <body>
    <div>
    </div>
    <form method="POST" action="register.php">
    <div id="registration_form">
    <label for="fname">First Name: </label>
     <input type="text" name="fname" placeholder="Enter your first name" required/><br />
     <label for="lname">Last Name: </label>
     <input type="text" name="lname" placeholder="Enter your last name" required/><br />
     <label for="email">Email: </label>
     <input type="text" name="email" placeholder="Enter your email" required/><br />
     <label for="username">Username: </label>
     <input type="text" name="username" placeholder="Enter your username" required/><br />
     <label for="password">Password: </label>   
     <input type="password" name="password" placeholder="Enter your password" required/><br />
     <label for="confirm_password">Confirm Password: </label>  
     <input type="password" name="confirm_password" placeholder="Confirm password" required/><br />
     <div class="buttonbox">
     <button type="reset" value="submit">Reset</button>
    <button type="submit" value="submit">Submit</button>
    </form>
    </div>
    </div>

    
      
    </form>
  </body>
</html>