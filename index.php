<html>
<head>
<title> shoutbox </title>
</head>
<body>
<h1>SHOUTBOX</h1>
<?php
$self = $_SERVER['PHP_SELF'];               //check
$ipadress = ("$_SERVER[REMOTE_ADDR]");      //the way code is written 
include ('db.php');
$connect= mysql_connect($host,$username,$password) or die('unable to connect to database server at this time');
mysql_select_db($database,$connect) or die ('unable to connect todatabase this time');
if(isset($_POST['$send']))
{ 
		if(empty($_POST['name']) || empty($_POST['email']) || empty($POST['post'])) {
					echo('you can leave the field empty');}
		else{
					$name= htmlspecialchars(mysql_real_escape_string($_POST['name']));
					$email=htmlspecialchars(mysql_real_escape_string($_POST['email']));
					$post=htmlspecialchars(mysql_real_escape_string($_POST['post']));
$sql = "INSERT INTO SHOUT set name='$name', email='$email' , post='$post' ;";
					if ( @mysql_query($sql)) {
						echo ('thanks for shouting');}
					else {
						echo ('sorry your shout can not be posted');}
				}
}

//retriving the shout 	

$query = "SELECT * FROM `SHOUT` ORDER BY `id` DESC LIMIT 8;";

$result = @mysql_query("$query") or die('
<p class="error">There was an unexpected error grabbing shouts from the database.

');

?><ul><?
//<p>On the first line, we create a new SQL query to "Retrieve all fields from the 'shouts' table, order them descending by the 'ID'; but only give us the latest 8".</p>
//s<p>On the second line we execute the query and store it in $result. We now:</p>
//<pre name="code" class="php"> 
		while ($row = mysql_fetch_array($result)) {

    $name = stripslashes($row['name']);
    $email = stripslashes($row['email']);
    $post = stripslashes($row['post']);

    //$grav_url = "http://www.gravatar.com/avatar.php?gravatar_id=".md5(strtolower($eemail))."&size=70"; 

    echo('
<li>
<div class="meta"><img src="%27.$grav_url.%27" alt="Gravatar">

'.$name.'
</div>
<div class="shout">

'.$post.'
</div>
</li>

');

}
?></ul><?
?>


<form action="<?php $self ?>" method="post">
<h2>shout</h2>
<div class="fname"><label for="name">
Name : </p></label><input name="name' type="text" cols=20 /></div>
<div class="femail"><label for="email">
Email: </p></label><input name="email" type="text cols=20" /></div>
<textarea name="post" rows=5 cols=40></textarea>
<input name="send" type="submit" value=submit />
</form>
</div><!--/content-->
<div id=boxbot></div>
</div><!--/container-->
</body>
<html>
</label>























	
