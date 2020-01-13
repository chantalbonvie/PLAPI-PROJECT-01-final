<?php

require_once("../conn.php");
//echo 'lol';



$search = isset($_POST["search"]) &&

//$_POST["search_make"] != "" ? $_POST["search_make"] : false;

//$_POST["search_nickname"] != "" ? $_POST["search_nickname"] : false;


$year = isset($_POST["year"]) ? $_POST["year"] : false;

//this prevents mysql injection 
$search = $db->real_escape_string(trim($search));
// $search_make = $db->real_escape_string(trim($search_make));
// $search_nickname = $db->real_escape_string(trim($search_nickname));
$year = $db->real_escape_string($year);

if($search || $year){

    //going to add special protection function so can't be easily hacked
    //mysqli realescape string
$search_sql = "SELECT * FROM cars
                WHERE nickname LIKE '%$search%'";

        if($year != 0) {
            $search_sql .= " AND year = $year";
        }


}else {
    $search_sql = "SELECT * FROM cars";
}

$result = $db->query($search_sql);


//make an array to store all cars in an array
$cars = array();

while($row = $result->fetch_assoc()){

$cars[] = $row; // append row to the $cars array

}
//when done with database close it for good practice
//this helps to speed up server

$db->close();

echo json_encode($cars); //return results in javaScript Object-notation



?>