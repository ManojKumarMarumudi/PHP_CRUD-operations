<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$id = $_GET['emp_id'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM employee WHERE emp_id=$id");

//redirecting to the display page (index.php in our case)
header("Location:read.php");
?>