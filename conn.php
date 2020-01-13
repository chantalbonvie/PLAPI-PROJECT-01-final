<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if($_SERVER["SERVER_NAME"] == "plapiproject01.denoftechies.online"){
    $db_servername = "localhost";
    $db_username = "plapi_project_01";
    $db_password = "zh1%62Q7"; // need to check this zhi or is it zh1
    $db_name = "PLAPI_Project01";
    

}else{
$db_servername = "localhost";
$db_username = "root";
$db_password = "root";
$db_name = "PLAPI-PROJECT-01";
}

//could have used conn instead of db but up to us
//here we create db object and connect
$db = new mysqli($db_servername, $db_username, $db_password, $db_name);


if($db->connect_error) {
 die("connection failed: " . $db->connect_error);
}



if(!isset($_SESSION)) session_start(); //starts a session to pass your session variables


// if($_SERVER["SERVER_NAME"] == "dev.denoftechies.online") {
//     //production connects to PLESK Databaase
//     $conn = mysqli_connect("localhost", "PLAPI-PROJECT-01_user", "7_23xcwY", "PLAPI-PROJECT-01");

// }else{

//     //connects to MAMP
//     $conn = mysqli_connect("localhost", "root", "root", "PLAPI-PROJECT-01");

// }


// if (mysqli_connect_errno($conn) ) {
//     echo "failed to connect to MYSQL:" . mysqli_connect_error();
// } 
?>