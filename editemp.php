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
 <title>Edit Employee</title>
 </head>
 <body>
 <h1>Edit Employee</h1>
 <?php
 if (empty($_GET['employeeid'])) {
    die("You need to select a employee from the form");
 }
 $employeeid = $_GET['employeeid'];

 require 'dbConnectHr.php'; 

 $sql = "SELECT employee_id, last_name, salary, department_id FROM employees WHERE employee_id = $employeeid";
 $result = mysqli_query($conn, $sql) or die("Error editing - ". mysqli_error($conn)); 
 if (mysqli_affected_rows($conn) == 0) {
    die("Error – record not found to edit");
 }
 while ($row = mysqli_fetch_array($result))
 {
	 $lastname = $row[last_name];
     $salary = $row[salary];
     $departmentid = $row[departmentid];
 }
 echo "<form action=updateemp.php method=GET>";
 echo "<input type=hidden name=charterid value=$employeeid>"; 
?>
    <label for="lastname">Last Name:</label>
    <?php echo "<input type=text id=lastname name=lastname value=\"$lastname\">"; ?>

    <label for="salary">Salary:</label>
    <?php echo "<input type=text id=salary name=salary value=\"$salary\">"; ?>

    <label for="departmentid">Department:</label>
        <select name="departmentid">
        <?php
        require 'dbConnectHr.php';
        $sql = "SELECT department_id, department_name FROM departments ORDER BY department_name";
        $result = mysqli_query($conn, $sql) or die("Error reading data - ".mysqli_error($conn));
    
        while ($row = mysqli_fetch_array($result))
        {
            if ($employeeid == $row[employee_id]){
                echo "<option value=$row[deaprtment_id] selected='selected'>$row[department_name]</option>";
            }else{
            echo "<option value=$row[department_id]>$row[department_name]</option>";
            }
        }
        ?>
        </select>
    <input type="submit" value="Insert" class="button">
    <a href="emp-list.php">Employee List</a>
    <a href="newemp.php">New Employee</a>
 </body>
</html>