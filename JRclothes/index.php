<?php


require_once "pdo.php";
session_start();
if ( isset($_POST['user_email']) 
     && isset($_POST['password'])) {
	
	//this way is vulnerable replace like below
	
	
	//get the typed email and password
	
        
	//$typed_email = $_POST['email'];
	//$typed_password = $_POST['password']; 	
		
    
	$sql = "SELECT * FROM users WHERE email = '$typed_email' AND password= '$typed_password'";
	
	//just for demonstration - delete
	echo("<pre>\n".$sql."\n</pre>\n");
	$stmt = $pdo->query($sql);
	$user = $stmt->fetch(PDO::FETCH_ASSOC);
	print_r($user);
	
	
	
	
	// this uses prepared statements so is not vulnerable to injection
	$statement = "SELECT * FROM users WHERE email = :email";
        $stmt = $pdo->prepare($statement);
	$stmt->execute(['email' => $_POST['user_email']]);
	$output_array = $stmt->fetch(PDO::FETCH_ASSOC);
      
	
	
        $allOK = false;
        
        if($output_array){
           $allOK = password_verify($_POST['password'], $output_array['password']);
        }
        
	if($allOK){
            $_SESSION["user"] = $output_array["user_id"];
            header('Location: member.php');
	}
	else{
            echo "You must enter a correct email and password";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">

<html>
<head>
	<a href="#maincontent" class="skip-link" >Skip to main content</a><br>
	<a href="index.html">
		<img src="main.png" alt="logo"></head></a>
	<link rel="stylesheet" href="mystyles.css">
	<title>Jr Sports clothing ltd</title>

</head>
<body>
	 <br>
	 <main id="maincontent" tabindex="-1">
		<nav>
			<ul id="nav">
				<li><a href="about.html">About us</a></li>
				<li><a href="shop.html">Shop</a></li>
				<li><a href="reviews.html">Reviews</a></li> 
				<li><a href="contact.html">Contact us</a></li>
				<li><a href="index.php">LOGIN/SIGN UP</a></li>
			</ul>
		</nav>
		<h1>Welcome...</h1>
	<h2>Log in here:</h2>
	<form method="post">
	<p>Email:
	<input type="text" name="user_email"></p>
	<p>Password:
	<input type="password" name="password"></p>
	<p><input type="submit" value="Log in now"/></p>
        <a href="create_user.php"><button type = "button">Don't have an account? | Sign up now! </button></a>
	<br>
	<a href="sock_search.html" class="button">SEARCH FOR AN ITEM!</a>
	
	<h1>Sign up now to enjoy members' discounts! </h1>
	<p>Please fill in this form to create a new account.</p>
	
