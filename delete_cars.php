<?php
	require_once 'conn.php';

$id = $_GET['id']; 

$del = mysqli_query($db,"DELETE FROM cars WHERE id='$id'"); // delete query

if($del)
{
    mysqli_close($db); // Close connection
    header("location:/index.php"); // back to index
    exit;	
}
else
{
    ?><br><?php
    echo "ERROR deleting record"; // display error message if delete does not work
}
?>