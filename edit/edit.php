<html>
<!-- Latest compiled and minified CSS -->
<!--making everything -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<!--navbar-->
<!--navbar-->
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
   <li><a href='../helppage/helppage.html'>Support</a></li>
   <form class="navbar-form navbar-left" role="search">
  <div class="form-group">
    <input type="search" name="search" id="mySearch" class="form-control" placeholder="Search">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
   <form action="logout.php" method="post"><button>Log out</button></form>

</ul>
</div>
<br>

<br><br>

<!-- post -->
<form name = "form1" action= "<?=$_SERVER['PHP_SELF']?>" method="post" onsubmit="addpost()">
<form name ="form2" action="javascript:addpost();">
<div class="wrapper">
<div class="commentBoxfloat">
    <fieldset>
      <div class="form_grp">
        <label>What's on your mind?</label>
        <input id="animal" type="text" name="animal" placeholder="Hmm..." > 
        <input id="postbtn" type="submit" name="submit" onclick="addpost()">
      </div>
      </fieldset> 
</div>
</div>
</form>
</form>




<!--php-->
<!--php-->
<!--php-->
<?php
if (isset($_GET['search'])) {
    $searchName = $_GET["search"];
	$printName = mysql_query("SELECT * FROM symbols WHERE animal=$searchName"); 
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
		date_default_timezone_set('Canada/Toronto');
		// open connection
		$connection = mysql_connect($host, $username, $password) or die ("Unable to connect!");

		// select database
		mysql_select_db($dbname) or die ("Unable to select database!");

		// create query
		$query = "SELECT * FROM symbols";
       
		// execute query
		$result = mysql_query($query) or die ("Error in query: $query. ".mysql_error());





			/*
				// see if any rows were returned
		if (mysql_num_rows($result) > 0) {
			for (int i = 0; i++) {
			}
    		// print them one after another
    		while($row = mysql_fetch_row($result)) {
    			$data[] = $row[0];
        		echo $data;
    		}

		} else {
			
    		// print status message
    		echo "No rows found!";
		}

		*/










		// free result set memory
		mysql_free_result($result);

		// set variable values to HTML form inputs
		$country = mysql_escape_string($arr[1]);
    	$animal = mysql_escape_string($_POST['animal']);
    	$cur_date = mysql_escape_string(date('Y-m-d H:i:s'));
		
		// check to see if user has entered anything
		if ($animal != "") {
	 		// build SQL query
			$query = "INSERT INTO symbols (country, animal, cur_date) VALUES ('$country', '$animal', '$cur_date')";
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
		
		// This is a comment
		//thanks ray 
		echo "<table>";
			if (isset($_GET['searchz'])) {
				$searchName = $_GET['searchz'];
				$sql = $db->prepare("SELECT * FROM symbols WHERE animal LIKE '$searchName%'");
				$sql->execute(array('$searchName%'=>$_REQUEST['searchz']));
				while ($row=$sql->fetch())
    			{
       //Here is where you will loop through all the results for your search. If 
       //you had for example for each product name, price, and category, 
       //you might do the following
       			echo "<tr><td>$row[animal]</td></tr>";
    		}
}
echo "</table>";

	?>
    

<body>

<div id="big">
<ul id="timeline" class="timeline">

	<!-- Item 1 -->
	<li>
		<div class="direction-r">
			<div class="flag-wrapper">
				<span class="flag">Freelancer</span>
				<span class="time-wrapper"><span class="time">2013 - present</span></span>
			</div>
			<div class="desc">My current employment. Way better than the position before!</div>
		</div>
	</li>
  
	<!-- Item 2 -->
	<li>
		<div class="direction-l">
			<div class="flag-wrapper">
				<span class="flag">Apple Inc.</span>
				<span class="time-wrapper"><span class="time">2011 - 2013</span></span>
			</div>
			<div class="desc">My first employer. All the stuff I've learned and projects I've been working on.</div>
		</div>
	</li>

	<!-- Item 3 -->
	<li>
		<div class="direction-r">
			<div class="flag-wrapper">
				<span class="flag">Harvard University</span>
				<span class="time-wrapper"><span class="time">2008 - 2011</span></span>
			</div>
			<div class="desc">A description of all the lectures and courses I have taken and my final degree?ectures and courses I have taken and my final degree?A description of all the lectures and courses I have taken and my final degree?A description of all the lectures and courses I have taken and my final degree?A description of all the lectures and courses I have taken and my final degree?A description of all the lectures and courses I have taken and my final degree?A description of all the lectures and courses I have taken and my final degree?A description of all the lectures and courses I have taken and my final degree?A description of all the lectures and courses I have taken and my final degree?A description of all the lectures and courses I have taken and my final degree?A description of all the lectures and courses I have taken and my final degree?</div>
		</div>
	</li>

	<li>
		<div class="direction-l">
			<div class="flag-wrapper">
				<span class="flag">Harvard University</span>
				<span class="time-wrapper"><span class="time">2008 - 2011</span></span>
			</div>
			<div class="desc">A description of all the lectures and courses I have taken and my final degree?A description of all the lectures and courses I have taken and my final degree?A description of all the lectures and courses I have taken and my final degree?A description of all the l</div>
		</div>
	</li>
</ul>
</div>



</body>
</html>

<script>

function addpost() {
	var left_right = 1;
    var div = document.createElement('div');

    var country = "<?php echo $country ?>"; //username
    var cur_date = "<?php echo $cur_date ?>";
    var animal = "<?php echo $animal ?>"; //tweets
    
    div.innerHTML = '<li> <div class="direction-r"> <div class="flag-wrapper"> <span class="flag">' + country + '</span>\ <span class="time-wrapper"> <span class="time">' + cur_date + '</span></span>\ </div>\ <div class="desc">' + animal + '</div>\ </div>\ </li>';
     document.getElementById('timeline').appendChild(div);
}

function ori_post() {

	var div = document.createElement('div');
    var country_ori = "<?php echo $country ?>"; //username
    var cur_date_ori = "<?php echo $cur_date ?>";
    var animal_ori = "<?php echo $animal ?>"; //tweets
    
    div.innerHTML = '<li> <div class="direction-r"> <div class="flag-wrapper"> <span class="flag">' + country_ori + '</span>\ <span class="time-wrapper"> <span class="time">' + cur_date_ori + '</span></span>\ </div>\ <div class="desc">' + animal_ori + '</div>\ </div>\ </li>';
     document.getElementById('timeline').appendChild(div);
}


</script>