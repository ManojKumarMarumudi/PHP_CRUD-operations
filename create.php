<html>
<head>
    <title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) { 
    $id = $_POST['emp_id'];
    $name = $_POST['emp_name'];
    $salary = $_POST['emp_salary'];
    $status = $_POST['emp_status'];
    $mobile = $_POST['emp_mobile'];
        
    // checking empty fields
    if(empty($id) || empty($name) || empty($salary) || empty($status) || empty($mobile)) {              
        if(empty($id)) {
            echo "<font color='red'>id field is empty.</font><br/>";
        }
        if(empty($name)) {
            echo "<font color='red'>name field is empty.</font><br/>";
        }
        
        if(empty($salary)) {
            echo "<font color='red'>salary field is empty.</font><br/>";
        }
        if(empty($status)) {
            echo "<font color='red'>status field is empty.</font><br/>";
        }
        if(empty($mobile)) {
            echo "<font color='red'>mobile field is empty.</font><br/>";
        }
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // if all the fields are filled (not empty)             
        //insert data to database
        $result = mysqli_query($mysqli, "INSERT INTO employee( emp_id,emp_name,emp_salary,emp_status,emp_mobile) VALUES('$id','$name','$salary','$status','$mobile')");
        
        //display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='read.php'>View Result</a>";
    }
}
?>
</body>
</html>