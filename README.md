<!-- 

<?php //authenticate2.php
 require_once 'login.php';
 $connection =
 new mysqli($db_hostname, $db_username, $db_password, $db_database);
 if ($connection->connect_error) die($connection->connect_error);
 if (isset($_SERVER['PHP_AUTH_USER']) &&
 isset($_SERVER['PHP_AUTH_PW']))
 {
 $un_temp = mysql_entities_fix_string($connection, $_SERVER['PHP_AUTH_USER']);
 $pw_temp = mysql_entities_fix_string($connection, $_SERVER['PHP_AUTH_PW']);
 $query = "SELECT * FROM users WHERE username='$un_temp'";
 $result = $connection->query($query);
 if (!$result) die($connection->error);
 elseif ($result->num_rows)
 {
 $row = $result->fetch_array(MYSQLI_NUM);
 $result->close();
 $salt1 = "qm&h*";
Using Sessions | 299
www.TechnicalBooksPdf.com
 $salt2 = "pg!@";
 $token = hash('ripemd128', "$salt1$pw_temp$salt2");
 if ($token == $row[3])
 {
 session_start();
 $_SESSION['username'] = $un_temp;
 $_SESSION['password'] = $pw_temp;
 $_SESSION['forename'] = $row[0];
 $_SESSION['surname'] = $row[1];
 echo "$row[0] $row[1] : Hi $row[0],
 you are now logged in as '$row[2]'";
 die ("<p><a href=continue.php>Click here to continue</a></p>");
 }
 else die("Invalid username/password combination");
 }
 else die("Invalid username/password combination");
 }
 else
 {
 header('WWW-Authenticate: Basic realm="Restricted Section"');
 header('HTTP/1.0 401 Unauthorized');
 die ("Please enter your username and password");
 }
 $connection->close();
 function mysql_entities_fix_string($connection, $string)
 {
 return htmlentities(mysql_fix_string($connection, $string));
 }
 function mysql_fix_string($connection, $string)
 {
 if (get_magic_quotes_gpc()) $string = stripslashes($string);
 return $connection->real_escape_string($string);
 }
?>
One other addition to the program is the “Click here to continue” link with a destina‐
tion URL of continue.php. This will be used to illustrate how the session will transfer
to another program or PHP web page. So create continue.php by typing the program
in Example 12-6 and saving it.
Example 12-6. Retrieving session variables
<?php // continue.php
 session_start();
 if (isset($_SESSION['username']))
 {
300 | Chapter 12: Cookies, Sessions, and Authentication
www.TechnicalBooksPdf.com
 $username = $_SESSION['username'];
 $password = $_SESSION['password'];
 $forename = $_SESSION['forename'];
 $surname = $_SESSION['surname'];
 echo "Welcome back $forename.<br>
 Your full name is $forename $surname.<br>
 Your username is '$username'
 and your password is '$password'.";
 }
 else echo "Please <a href='authenticate2.php'>click here</a> to log in.";
?> 
-->
