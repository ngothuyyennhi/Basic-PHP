<?php 
    

    

    //conn
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "quanlycuahang";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);
    if ($conn->connect_error) die($conn->connect_error);
    
    function queryMySql($query){
        global $conn;
        $result = $conn->query($query);
        if (!$result) die($conn->error);
        return $result;
    }

    function sanitizeString($var){
        $var = filter_var($var,FILTER_SANITIZE_SPECIAL_CHARS);
        return $var;
    }

    function destroySession(){
        $_SESSION = array();
        if (session_id() != "") {
            session_destroy();
        }
        //set cookiee...
    }
    // function url_for($script)
    // {
    //     return WWW_ROOT.$script;
    // }

?>

<!-- <?php 
    // session_start();
    //some syntax
    echo "a: [".TRUE."] <br>";
    $x = (1>0);
    echo "b: [". $x."] <br>";
    //Cookie
    setcookie($_COOKIE="cookiename", 
        $value ="test", 
        time()+86500, 
        "/");
    
?> -->