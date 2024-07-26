<?php
session_start();
include 'DbConnector.php';

if (isset($_POST["login"])) {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    $username = filter_var($username, FILTER_SANITIZE_STRING);
    $password = filter_var($password, FILTER_SANITIZE_STRING);

    $db = new DbConnector();
    $conn = $db->getConnection();

    $sql = "SELECT * FROM admin_info WHERE admin_username = :username AND admin_password = :password";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);

    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $_SESSION['loggedin'] = true;
        $_SESSION["username"] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        echo '<div class="alert alert-danger" style="font-weight:bold; text-align: center; margin-top: 20px;"> Username and Password are not matched!</div>';
    }
} else {
    header("Location: index.php");
    exit();
}
