<?php
	if (empty($_POST['name'])){
		die("You need to enter a username.");
		session_name('Employees');
		session_start();
		session_unset();
	} else{
		$name = $_POST['name'];
		session_name('Employees');
		session_start(); 
		$_SESSION['Name'] = $name;
		echo "<h1>Welcome back $name</h1>";
		echo "<a href=\"emp-list.php\">Employee List</a>";
		echo "<a href=\"newemp.php\">New Employee</a>";
	}
?>