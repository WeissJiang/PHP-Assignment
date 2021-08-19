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
<title>Insert Employee</title>
</head>
 <body>
 <h1>Insert Employee</h1>
 <?php 
 if (isset($_GET['lastname']) && isset($_GET['salary']) && isset($_GET['departmentid']))
 { 
	 $lastname = trim($_GET['lastname']);
	 $salary = trim($_GET['salary']);
     $departmentid = trim($_GET['departmentid']);

	 if (empty($lastname) || empty($salary) || empty($department)) {
        die("Employee data has not been entered");
     }
	 else{

		 require 'dbConnectHr.php'; 

		 if(is_numeric($salary)){
			$sql = "INSERT INTO employees (last_name, salary, department_id) 
                    VALUES('$lastname', '$salary, '$departmentid')";
		 }else{
			die("The salary amount should be a number.");
		 }

		 $result = mysqli_query($conn, $sql) or die("Error updating data ".mysqli_error($conn));
		 $numrows = mysqli_affected_rows($conn);
		 if ($numrows == 1) {
            echo "<h2>".$numrows." employee inserted</h2>";
         }
		 else {
			echo "<p>Employee insert failed. $numrows were updated</p>";
         } 
	 }
 }
 else
 {
	die("You must supply all the employee information");
 }
 ?>
 <a href="emp-list.php">Employee List</a>
 <a href="newemp.php">New Employee</a>
 </body>
</html>