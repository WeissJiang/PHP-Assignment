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
<title>New Employee</title>
</head>
<body>
    <h1>New Employee</h1>
    <form action=insertemp.php method=GET>
    
    <label for="lastname">Last Name:</label><input type=text id=lastname name=lastname>

    <label for="salary">Salary:</label><input type=text id=salary name=salary>

    <label for="departmentid">Department:</label>
        <select name="departmentid">
        <?php
        require 'dbConnectHr.php';
        $sql = "SELECT department_id, department_name FROM departments ORDER BY department_name";
        $result = mysqli_query($conn, $sql) or die("Error reading data - ".mysqli_error($conn));
    
        while ($row = mysqli_fetch_array($result))
        {
        echo "<option value=$row[department_id]>$row[department_name]</option>";
        }
        ?>
        </select>
    
    <a href="emp-list.php">Employee List</a><input type="submit" value="Insert" class="button">
</body>
</html>