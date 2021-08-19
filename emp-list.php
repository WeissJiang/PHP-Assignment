<html>
    <head>
      <title>Employee List</title>
    <head>
      <body>
      <h1>Employee List</h1>
      <?php
           require 'dbConnectHr.php'; 

           $sql = "SELECT  employee_id, last_name, salary, department_id 
                    FROM   employees ORDER BY Salary DESC;";
           $result = mysqli_query($conn, $sql) or die("Error reading products - ".mysqli_error($conn));
           
           session_name('Employees');
           session_start();
           if (isset($_SESSION['Name'])){
            $name = $_SESSION['Name'];
            echo "<p>Welcome back $name, No $name? <a href=\"welcome.html\">Click here.</a></p>";
           }
  
           echo "<table>";
           echo "<tr><td>Last Name</td><td>Salary</td><td>Department ID</td><td>Action</td></tr>";
  
           while ($row = mysqli_fetch_array($result))
           {
               echo "<tr>";
               echo "<td>$row[last_name]</td>";
               echo "<td>$row[salary]</td>"; 
               echo "<td>$row[department_id]</td>";

               echo "<td><a href=editemp.php?employeeid=$row[employee_id]>Edit</a> " .
                    "<a href=deleteemp.php?emplyeeid=$row[employee_id]>Delete</a></td>";
               echo "</tr>";
           }
           echo "</table>";
           mysqli_close($conn);

           echo "<br><a href=newemp.php>New Employee</a><br><br>";
           ?>
       </body>
</html>