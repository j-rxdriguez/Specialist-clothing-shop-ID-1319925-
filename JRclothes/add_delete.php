<?php
require_once "pdo.php";
require_once "test_membership.php";

if (isset($_POST['name']) && isset($_POST['brand']) && isset($_POST['colour']) && isset($_POST['size']) && isset($_POST['price'])) {


    $statement = "INSERT INTO products (name, brand, colour, size, price) 
              VALUES (:name, :brand, :colour,:size,:price)";
    
    $stmt = $pdo->prepare($statement);
    $stmt->execute(array(
        ':name' => $_POST['name'],
        ':brand' => $_POST['brand'],
        ':colour' => $_POST['colour'],
        ':size' => $_POST['size'],
        ':price' => $_POST['price']));
    }
    
    $stmt = $pdo->query("SELECT name, brand, colour, size, price FROM products");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en-GB">
    <head>
        <meta charset="UTF-8">
        <title>Add Product-Members Area</title>

    </head>
    <body>
        <h1>Add new product</h1>
        <table border="1">
<?php
    foreach ($rows as $row) {
        echo "<tr><td>";
        echo($row['name']);
        echo("</td><td>\n");
        echo($row['brand']);
        echo("</td><td>\n");
        echo($row['colour']);
        echo("</td><td>\n");
        echo($row['size']);
        echo("</td><td>\n");
        echo($row['price']);  
        echo("</td></tr>\n");
    }

?>
    </table>
    <!- Should use proper semantic HTML -->
    <p>Add new item: </p>
    <form method="post">
        <p>name:
            <input type="text" name="name" size="40"></p>
        <p>brand:
            <input type="text" name="brand"></p>
        <p>colour:
            <input type="color" name="colour"></p>
        <p>size:
            <input type="int" name="size"></p>
        <p>price:
            <input type="text" name="price"></p>
        <p><input type="submit" value="Add New"/></p>
        
    </form>        
    <a href="logout.php"><button type = "button">Log Out</button></a>

</body>
</html>

