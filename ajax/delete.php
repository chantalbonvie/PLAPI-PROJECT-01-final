<?php
require_once("../conn.php");


// if id is set
// then delete from database
// and return success message
var_dump($_POST);
$car_id = (isset($_POST["id"])) ? intval($_POST["id"]) : false;

if($car_id) {

    $delete_sql = "DELETE FROM cars WHERE id = $car_id";
    $db->query($delete_sql);

    echo 'success👍🏻';

}

?>