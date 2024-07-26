<?php
require_once 'session.php';
require_once 'DbConnector.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = trim($_POST['fullname']);
    $mobileno = trim($_POST['mobileno']);
    $emailid = trim($_POST['emailid']);
    $age = trim($_POST['age']);
    $gender = trim($_POST['gender']);
    $blood = trim($_POST['blood']);
    $address = trim($_POST['address']);

    $db = new DbConnector();
    $conn = $db->getConnection();

    $sql = "INSERT INTO donor_details (donor_name, donor_number, donor_mail, donor_age, donor_gender, donor_blood, donor_address) 
            VALUES (:fullname, :mobileno, :emailid, :age, :gender, :blood, :address)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':fullname', $fullname, PDO::PARAM_STR);
    $stmt->bindParam(':mobileno', $mobileno, PDO::PARAM_STR);
    $stmt->bindParam(':emailid', $emailid, PDO::PARAM_STR);
    $stmt->bindParam(':age', $age, PDO::PARAM_INT);
    $stmt->bindParam(':gender', $gender, PDO::PARAM_STR);
    $stmt->bindParam(':blood', $blood, PDO::PARAM_STR);  // Change the type to PDO::PARAM_STR to match the database schema
    $stmt->bindParam(':address', $address, PDO::PARAM_STR);

    if ($stmt->execute()) {
        header('Location: add_donor.php?status=success');
    } else {
        header('Location: add_donor.php?status=error');
    }
} else {
    header('Location: add_donor.php');
}
