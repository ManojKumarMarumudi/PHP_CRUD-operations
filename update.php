<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{   
    $id = $_POST['emp_id'];
    $name = $_POST['emp_name'];
    $salary = $_POST['emp_salary'];
    $status = $_POST['emp_status'];
    $mobile = $_POST['emp_mobile'];
    
    // checking empty fields
    if(empty($name) || empty($salary) || empty($status) || empty($mobile)) {              
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
    } else {    
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE employee SET emp_id='$id',emp_name='$name',emp_salary='$salary',emp_status='$status',emp_mobile='$mobile' WHERE emp_id=$id");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: read.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['emp_id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM employee WHERE emp_id=$id");

while($res = mysqli_fetch_array($result))
{
    $name = $res['emp_name'];
    $salary = $res['emp_salary'];
    $status = $res['emp_status'];
    $mobile = $res['emp_mobile'];
}
?>
<html>
<head>  
    <title>Update Data</title>
    <style>
        body{
            background-color:#CCEEFF;
        }
    </style>
</head>

<body>
    <center>
    <a href="read.php">Home</a>
    <br/><br/>
    
    <form name="form1" method="post" action="update.php">
        <table border="0">
            <tr> 
                <td>Name</td>
                <td><input type="text" name="emp_name" value="<?php echo $name;?>"></td>
            </tr>
            <tr> 
                <td>Salary</td>
                <td><input type="text" name="emp_salary" value="<?php echo $salary;?>"></td>
            </tr>
            <tr> 
                <td>Status</td>
                <td><input type="text" name="emp_status" value="<?php echo $status;?>"></td>
            </tr>
            <tr> 
                <td>Mobile</td>
                <td><input type="text" name="emp_mobile" value="<?php echo $mobile;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="emp_id" value=<?php echo $_GET['emp_id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
    </center>
</body>
</html>