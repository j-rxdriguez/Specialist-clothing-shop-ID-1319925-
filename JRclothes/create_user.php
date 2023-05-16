<?php
require_once "pdo.php";
#require_once "create_user.php";

if ( isset($_POST['name']) && isset($_POST['email']) 
     && isset($_POST['password'])) {
    $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
    echo $hash;
    echo "<br><br>";
    $statement = "INSERT INTO users (name, email, password) 
              VALUES (:name, :email, :password)";
    echo("<pre>\n".$statement."\n</pre>\n");
    $stmt = $pdo->prepare($statement);
    $stmt->execute(array(
        ':name' => $_POST['name'],
        ':email' => $_POST['email'],
        ':password' => $hash ));
}

if ( isset($_POST['delete']) && isset($_POST['user_id']) ) {
    $statement = "DELETE FROM users WHERE user_id = :zip";
    echo "<pre>\n$statement\n</pre>\n";
    $stmt = $pdo->prepare($statement);
    $stmt->execute(array(':zip' => $_POST['user_id']));
}
$stmt = $pdo->query("SELECT name, email, password, user_id FROM users");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en-GB">
<head>
    <meta charset="UTF-8">
    <title>Create User</title>
</head>
<body>
    <h1>The Sock shop</h1>
    <h2>Create an account</h2>
	<table border="1">
	<p>Create new user: </p>
<form method="post">
<p>Name:
<input type="text" name="name" size="40"></p>
<p>Email:
<input type="text" name="email"></p>
<p>Password:
<input type="password" name="password"></p>
<p><input type="submit" value="Create account now!"/></p>
</form>

 <a href="logout.php"><button type = "button">Log Out</button></a>
</body>
<?php
foreach ( $rows as $row ) {
    echo "<tr><td>";
    echo($row['name']);
    echo("</td><td>");
    echo($row['email']);
    echo("</td><td>");
    echo($row['password']);
    echo("</td><td>");
    echo('<form method="post"><input type="hidden" ');
    echo('name="user_id" value="'.$row['user_id'].'">'."\n");
    echo('<input type="submit" value="Del" name="delete">');
    echo("\n</form>\n");
    echo("</td></tr>\n");
}
?>
</table>

