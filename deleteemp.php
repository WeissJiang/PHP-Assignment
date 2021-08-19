
<?php
    session_name('Employees');
    session_start();
    if (isset($_SESSION['Name'])){
        $name = $_SESSION['Name'];
        echo "<p>Welcome back $name, No $name? <a href=\"Welcome.html\">Click here</a></p>";
       }
?>
<html>
 <head>
      <title>Delete Employee</title>
 </head>
 <body>
 <h1>Employee Deleted</h1>
 <?php
 if (empty($_GET['employeeid'])) {
    die("You must select a employee to delete");
 }
 $employeeid = $_GET['employeeid'];
 require 'dbConnectHr.php'; 

 $sql = "DELETE FROM employees WHERE employee_id = $employeeid";
 $result = mysqli_query($conn, $sql) or die("Error deleting Data - ".mysqli_error($conn));
 $numrows = mysqli_affected_rows($conn);
 if ($numrows == 1) {
    echo "<h2>".$numrows." employee deleted</h2>";
 }
 else {
    echo "<p>Delete failed. $numrows were deleted</p>";
 }
 mysqli_close($conn);
 ?>
 <a href="emp-list.php">Employee List</a>
 <a href="newemp.php">New Employee</a>
 </body>
</html>