
<?php
    
    require_once './backend/config/init.php';
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $password = $_POST["password"];
            echo $username . " " . $password;
            //kiem tra dinh dang hop le
            if (!empty($username) && !empty($password)) {
                if (preg_match("/^[a-zA-Z0-9_]{6,20}$/",$username)) {
                    $db_name = sanitizeString($username);
                    //kiem tra rbtv
                $result = queryMySql("SELECT * FROM users WHERE username='$db_name'");
                if ($result->num_rows)     echo "<span class='taken'>&nbsp;&#x2718; " ."This username is taken</span>"; 
                    else {
                        $token = password_hash($password, PASSWORD_DEFAULT)  ;  
                        if (queryMySql("INSERT INTO USERS (username,password) VALUE ('$db_name','$token')")) {
                            echo "sign up succesful<br>";
                            // header("location: login.php");
                        }
                    }
                }
                else echo "Invalid value<br>";
                //....
                
                
            }
            else echo "Fill in the blanks";

        }
        ?>        
<!-- fe -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"></link>
</head>
<body>
    <form id = "signupForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <P><label>Type your Name:</label><input type="text" name="username" required"></P>
        <p><label>Type your password:</label><input type="password" name="password" required></p>
        <p><input type="submit" name="signupbtn" value="Sign Up"></p>
        <p class ="small fw-bold mt-2 pt-1"> Already have an account? <a href="login.php">Login</a></p>
    </form>  




</body>
</html> 
