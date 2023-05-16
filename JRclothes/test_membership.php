<?php
//in an include file bacause this code will appear in several files

session_start();


if (isset($_SESSION['user'])){
    $statement = "SELECT * FROM users WHERE user_id = :user";
    //just for demonstration - delete
    echo("<pre>\n" . $statement . "\n</pre>\n");
    $stmt = $pdo->prepare($statement);
    $stmt->execute(['user' => $_SESSION['user']]);
    $output_array = $stmt->fetch(PDO::FETCH_ASSOC);
    //$user = $stmt->fetchColumn();
    //just for demonstration - delete
    print_r($output_array);
    $username = $output_array["name"];
}
else{
    header('Location: login.php ');

}