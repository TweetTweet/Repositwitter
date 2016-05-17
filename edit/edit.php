<html>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<!--navbar-->
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="css/style.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
   <title>Home</title>
</head>
<div id='cssmenu'>
<ul>
   <li><img src="https://www.seeklogo.net/wp-content/uploads/2011/06/twitter-bird-vector-400x400.png" width = 42; height = 42;><li>
   <li class='active'><a href='#'>Home</a></li>
   <li><a href='#'>Explore</a></li>
   <li><a href='../helppage/helppage.html'>Support</a></li>
   <form class="navbar-form navbar-left" role="search">
  <div class="form-group">
    <input type="search" name="search" id="mySearch" class="form-control" placeholder="Search">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
  <button class="btn fourth" onclick="location='../logout/logout.php'" method="post" >Logout</button>
</form>
</ul>
</div>
<br>
<body>
<br><br>
<!--Searching-->
<?php
if (isset($_GET['search'])) {
    $searchName = $_GET["search"];
	$printName = mysql_query("SELECT * FROM users WHERE username=$searchName"); 
	print "<h1>$printName</h1>";
}
// pass in some info;
		require("../common/common.php"); 
		
		if(empty($_SESSION['user'])) { 
  
			// If they are not, we redirect them to the login page. 
			$location = "http://" . $_SERVER['HTTP_HOST'] . "../login/login.php";
			echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL='.$location.'">';
			//exit;
         
        	// Remember that this die statement is absolutely critical.  Without it, 
        	// people can view your members-only content without logging in. 
        	die("Redirecting to login.php"); 
    	} 
		
		// To access $_SESSION['user'] values put in an array, show user his username
		$arr = array_values($_SESSION['user']);
		echo "<p id='p3'>Welcome, $arr[1]</p>";
		$name = $arr[1];
// Banner and profile picture
if (substr($name, 0, 1) === "j")
{
	echo "<div class='parent'>";
	echo "<img src='https://i.ytimg.com/vi/mJP5qFwTprk/maxresdefault.jpg' alt='Nanalan' class='container' width= '1270' height='300'>";
	echo "<div class='inner'><img src='https://upload.wikimedia.org/wikipedia/commons/thumb/8/85/Smiley.svg/2000px-Smiley.svg.png' class='img-thumbnail' alt='Smiley face' width='128' height='128'/>";
	echo "</div></div>";
}
if (substr($name, 0, 1) === "b")
{
	echo "<div class='parent'>";
	echo "<img src='http://assets.hightimes.com/styles/large/s3/WeedTrivia-Quiz.jpg?itok=CwZSKzX1' alt='Scenary' 			class='container' width= '1270' height='300'>";
	echo "<div class='inner'><img src='https://pbs.twimg.com/media/Cfmydy5W4AEjJJe.jpg' class='img-thumbnail' alt='NFKRZ' width='128' 	height='128'/>";
	echo "</div></div>";
}
if (substr($name, 0, 1) === "a")
{
	echo "<div class='parent'>";
	echo "<img src='https://static.pexels.com/photos/909/flowers-garden-colorful-colourful.jpg' alt='Scenary' class='container' 	width='1270' height='300'>";
	echo "<div class='inner' id='profilePic'><img src='http://www.technobuffalo.com/wp-content/uploads/2016/05/Poke%CC%81mon-Sun-and-Moon-5-1280x1717.jpg' class='img-thumbnail' alt='Litten' width='128' height='128' /> ";
 	echo "</div></div>";
}
?>
    <br><br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div></div></div>
	<?php

		// open connection
		$connection = mysql_connect($host, $username, $password) or die ("Unable to connect!");

		// select database
		mysql_select_db($dbname) or die ("Unable to select database!");

		// create query
		$query = "SELECT * FROM symbols";
       
		// execute query
		$result = mysql_query($query) or die ("Error in query: $query. ".mysql_error());

		// free result set memory
		mysql_free_result($result);

		// set variable values to HTML form inputs
		$country = mysql_escape_string($_POST['country']);
    	$animal = mysql_escape_string($_POST['animal']);
		
		// check to see if user has entered anything
		if ($animal != "") {
	 		// build SQL query
			$query = "INSERT INTO symbols (country, animal) VALUES ('$country', '$animal')";
			// run the query
     		$result = mysql_query($query) or die ("Error in query: $query. ".mysql_error());
			// refresh the page to show new update
	 		echo "<meta http-equiv='refresh' content='0'>";
		}
		
		// if DELETE pressed, set an id, if id is set then delete it from DB
		if (isset($_GET['id'])) {

			// create query to delete record
			echo $_SERVER['PHP_SELF'];
    		$query = "DELETE FROM symbols WHERE id = ".$_GET['id'];

			// run the query
     		$result = mysql_query($query) or die ("Error in query: $query. ".mysql_error());
			
			// reset the url to remove id $_GET variable
			$location = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
			echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL='.$location.'">';
			exit;
			
		}
		
		// close connection
		mysql_close($connection);

	?>
    
<div id="comment">

<div class="wrapper">
<div class="commentBoxfloat">
  <form id="cmnt">
    <fieldset>
      <div class="form_grp">
        <label>What's on your mind?</label>
        <textarea id="userCmnt" placeholder="Write your comment here. You can Edit and Delete options. Just Hover in Your comment, you see the both buttons"></textarea>        
      </div>
      <div class="form_grp">
      <button type="button" id="commentsub">Submit</button>
      </div>
    </fieldset>
  </form>  
</div>
  <div id="cmntContr"></div>
  
  
 </div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js/index.js"></script>
   
</div>
	</body>
</html>