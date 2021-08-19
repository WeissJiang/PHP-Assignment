<?php
    session_name('Employees');
    session_start();
    if (isset($_SESSION['Name'])){
        $name = $_SESSION['Name'];
        echo "<p>Welcome back $name, No $name? <a href=\"welcome.html\">Click here</a></p>";
       }
?>
<html>
<head>
      <title>Update Employee</title>
<head>
 <body>
 <h1>Update Employee</h1>
 <?php
 if (empty($_GET['employeeid'])||
     empty($_GET['lastname'])||
     empty($_GET['salary'])||
	 empty($_GET['departmentid'])) {
        die("You must use the edit screen to supply values for the employee.");
     }

 $employeeid = $_GET['employeeid']; 
 $lastname = trim($_GET['lastname']);
 $salary = trim($_GET['salary']);
 $departmentid = trim($_GET['departmentid']);
 
 if (!$employeeid || !$lastname || !$salary || !$departmentid) {
    die("Employee information has not been entered");
 }

 require 'dbConnectHr.php'; 

 if(is_numeric($salary)){
    $sql = "UPDATE employees SET last_name='$lastname', salary='$salary', department_id='$departmentid' WHERE employee_id = $employeeid";
 }else{
    die("The salary should be a number.");
 }

 $result = mysqli_query($conn, $sql) or die("Error updating data ".mysqli_error($conn));
 $numrows = mysqli_affected_rows($conn);
 if ($numrows == 1) {
    echo "<h2>".$numrows." employee updated</h2>";
 }
 else {
    echo "<p>Update failed. $numrows were updated</p>";
 }
 ?>
<a href="emp-list.php">Employee List</a>
 <a href="newemp.php">New Employee</a>
 </body>
</html>