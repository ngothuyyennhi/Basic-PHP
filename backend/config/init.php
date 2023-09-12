<?php 
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    require_once "config.php";
    include "function.php";
    // $loadFromUser=new User;
    spl_autoload_register(function($className){
        require_once "./classes/$className.php";
    });
    $db = new Database();
?>