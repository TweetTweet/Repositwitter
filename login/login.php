<?php 

    // First we execute our common code to connection to the database and start the session 
    require("../common/common.php"); 
     
    // This variable will be used to re-display the user's username to them in the 
    // login form if they fail to enter the correct password.  It is initialized here 
    // to an empty value, which will be shown if the user has not submitted the form. 
    $submitted_username = ''; 
     
    // This if statement checks to determine whether the login form has been submitted 
    // If it has, then the login code is run, otherwise the form is displayed 
    if(!empty($_POST)) 
    { 
        // This query retreives the user's information from the database using 
        // their username. 
        $query = " 
            SELECT 
                id, 
                username, 
                password, 
                salt, 
                email 
            FROM users 
            WHERE 
                username = :username 
        "; 
         
        // The parameter values 
        $query_params = array( 
            ':username' => $_POST['username'] 
        ); 
         
        try 
        { 
            // Execute the query against the database 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        { 
            // Note: On a production website, you should not output $ex->getMessage(). 
            // It may provide an attacker with helpful information about your code.  
            die("Failed to run query: " . $ex->getMessage()); 
        } 
         
        // This variable tells us whether the user has successfully logged in or not. 
        // We initialize it to false, assuming they have not. 
        // If we determine that they have entered the right details, then we switch it to true. 
        $login_ok = false; 
         
        // Retrieve the user data from the database.  If $row is false, then the username 
        // they entered is not registered. 
        $row = $stmt->fetch(); 
        if($row) 
        { 
            // Using the password submitted by the user and the salt stored in the database, 
            // we now check to see whether the passwords match by hashing the submitted password 
            // and comparing it to the hashed version already stored in the database. 
            $check_password = hash('sha256', $_POST['password'] . $row['salt']); 
            for($round = 0; $round < 65536; $round++) 
            { 
                $check_password = hash('sha256', $check_password . $row['salt']); 
            } 
             
            if($check_password === $row['password']) 
            { 
                // If they do, then we flip this to true 
                $login_ok = true; 
            } 
        } 
         
        // If the user logged in successfully, then we send them to the private members-only page 
        // Otherwise, we display a login failed message and show the login form again 
        if($login_ok) 
        { 
            // Here I am preparing to store the $row array into the $_SESSION by 
            // removing the salt and password values from it.  Although $_SESSION is 
            // stored on the server-side, there is no reason to store sensitive values 
            // in it unless you have to.  Thus, it is best practice to remove these 
            // sensitive values first. 
            unset($row['salt']); 
            unset($row['password']); 
             
            // This stores the user's data into the session at the index 'user'. 
            // We will check this index on the private members-only page to determine whether 
            // or not the user is logged in.  We can also use it to retrieve 
            // the user's details. 
            $_SESSION['user'] = $row; 
             
            // Redirect the user to the private members-only page. 
            error_reporting(E_ALL | E_WARNING | E_NOTICE);
            ini_set('display_errors', TRUE);


            header('Location:../edit/edit.php');
            die('Redirecting to edit.php');
            flush();//it will flush all collected headers. Afterwards it can send all the output it wants. But sending further HTTP headers is impossible then. Simillar mechanics with print
            
        } 
        else 
        { 
            // Tell the user they failed 
            print("Login Failed."); 
             
            // Show them their username again so all they have to do is enter a new 
            // password.  The use of htmlentities prevents XSS attacks.  You should 
            // always use htmlentities on user submitted values before displaying them 
            // to any users (including the user that submitted them).  For more information: 
            // http://en.wikipedia.org/wiki/XSS_attack 
            $submitted_username = htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8'); 
        } 
    } 
    
?>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<html>

  <head>
    <meta charset="UTF-8">
    <title>Welcome!</title>
    <link rel="stylesheet" href="css/style.css">
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  </head>

  <body>
    <div id=div1></div>
      <div class="content"></div>
        <!--text-->
        <!--text-->
        <!--text-->
        <!--text-->
        <div id="text1">
        <svg viewBox="0 0 800 600">
            <symbol id="s-text">
                <text text-anchor="middle"
                    x="50%"
                    y="20%"
                    class="text--line"
                >
                Login
                </text>
    
            </symbol>
  
            <g class="g-ants">
                <use xlink:href="#s-text" class="text-copy"></use>     
                <use xlink:href="#s-text" class="text-copy"></use>     
                <use xlink:href="#s-text" class="text-copy"></use>     
                <use xlink:href="#s-text" class="text-copy"></use>  
                <use xlink:href="#s-text" class="text-copy"></use>    
            </g>
        </svg>
        </div>
        <!--login page -->
        <!--login page -->
        <!--login page -->
        <!--login page -->
        <!--login page -->
        <div class="container">
        <form class-'form-inline' action="login.php" method="post">
          <div class="row"> 
          <div class='form-group col-lg-3'>
          <label for="code">Username:</label><br /> 
          <input class='form-control' type="text" name="username" value="<?php echo $submitted_username; ?>" />
          </div>
          </div>
          <br /><br /> 
          <div class="row"> 
          <div class='form-group col-lg-3'>
          <label for="code">Password</label><br /> 
          <input class='form-control' type="password" name="password" value="" /> 
          </div>
          </div>
          <button type="submit" class="btn second" value="Login" />Login</button>

        </form> 
        <button class="btn fourth" onclick="location='../register/register.php'"/>Register</button>
    
</div>
  </body>
</html>
