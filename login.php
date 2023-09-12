<?php
    
    require_once './backend/config/function.php';
    if (isset($_POST["loginBtn"])) {
    // if ($_SERVER["REQUEST_METHOD"] == "POST"){

        $username = $_POST["username"];
        $password = $_POST["password"];
        if (!empty($username) && !empty($password)){
            if (preg_match("/^[a-zA-Z0-9_]{6,20}$/",$username)) {
                $db_name = sanitizeString($username);
                //kiem tra rbtv
                $result = queryMySql("SELECT user_id, password FROM users WHERE username='$db_name'");
                if (!$result->num_rows)     echo "<span class='taken'>&nbsp;&#x2718; " ."This username isn't taken</span>"; 
                else {
                    $res = $result->fetch_assoc()['password'];
                    $id = $result->fetch_assoc()['user_id'];
                    if (password_verify($password,$res)) {
                        echo "log in succesful<br>";                      
                        // Password is correct, so start a new session
                        session_start();                         
                        // Store data in session variables
                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $id;                   
                        $_SESSION["username"] = $db_name; 
                        // Redirect user to welcome page
                        header("location: welcome.php");
                    }
                    else echo "Incorrect pass";
                }
            }
            else echo "<br>Invalid value<br>";
            //....
        }
        echo "<br>Fill in the blanks<br>";
    }

?> 
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=`device-width`, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"></link>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
  <div class="container h-100">
    <div class="justify-content-center align-items-center"> 
      <form id = "loginForm" class ="align-items-center justify-content-center" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <!-- Username input -->
        <div class="form-outline mb-4">
          <input type="text" id="loginForm" class="form-control" name="username" required/>
          <label class="form-label" for="loginForm"  >Username</label>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
          <input type="password" id="loginForm" class="form-control" name="password" required/>
          <label class="form-label" for="loginForm" >Password</label>
        </div>

        <!-- 2 column grid layout for inline styling -->
        <div class="row mb-4">
          <div class="col d-flex justify-content-center">
            <!-- Checkbox -->
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="loginForm" checked />
              <label class="form-check-label" for="loginForm"> Remember me </label>
            </div>
          </div>

          <div class="col">
            <!-- Simple link -->
            <a href="#!">Forgot password?</a>
          </div>
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4" name="loginBtn">Sign in</button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>  


