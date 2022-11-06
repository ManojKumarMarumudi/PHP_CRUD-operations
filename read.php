<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM employee ORDER BY emp_id DESC"); // using mysqli_query instead
?>

<html>
<head>  
    <title>Homepage</title>
    <style>
        body{
            background-color:#CCEEFF;
        }
    </style>
</head>

<body>
    <center>
    <a href="create.html">Add New Data</a><br/><br/>

    <table width='80%' border=0>
        <tr bgcolor='#CCCCCC'>
            <td>Id</td>
            <td>Name</td>
            <td>Salary</td>
            <td>Status</td>
            <td>Mobile</td>
        </tr>
        <?php 
        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
        while($res = mysqli_fetch_array($result)) {         
            echo "<tr>";
            echo "<td>".$res['emp_id']."</td>";
            echo "<td>".$res['emp_name']."</td>";
            echo "<td>".$res['emp_salary']."</td>";
            echo "<td>".$res['emp_status']."</td>";
            echo "<td>".$res['emp_mobile']."</td>";  
            echo "<td><a href=\"update.php?emp_id=$res[emp_id]\">Update</a> | <a href=\"delete.php?emp_id=$res[emp_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";       
        }
        ?>
    </table>
    </center>
</body>
</html>