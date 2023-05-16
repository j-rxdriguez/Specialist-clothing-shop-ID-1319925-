<?php

require_once "pdo.php";
require_once "test_membership.php";

?>

<!DOCTYPE html>
<html lang="en-GB">
<head>
    <meta charset="UTF-8">
    <title>Members Area</title>
    
</head>
<body>
	<h1>Welcome back, <?= $username?></h1>
        <h2>What do you want to do?</h2>
        <ul>
            <li><a href= "create_user.php">Create new user</a></li>
            <li><a href= "add_delete.php">Add / Remove product</a></li>
        </ul>

        
        <a href="logout.php"><button type = "button">Log Out</button></a>
	
</body>
</html>

