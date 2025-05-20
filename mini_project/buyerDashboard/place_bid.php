<?php
session_start();
require 'db_connection.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'buyer') {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user_id = $_SESSION['user_id'];
    $crop_id = $_POST['crop_id'];
    $amount = $_POST['amount'];

    $stmt = $conn->prepare("INSERT INTO bids (crop_id, user_id, amount) VALUES (?, ?, ?)");
    $stmt->bind_param("iid", $crop_id, $user_id, $amount);

    if ($stmt->execute()) {
        header("Location: my_bids.php?success=1");
        exit;
    } else {
        header("Location: view_crops.php?error=Could not place bid");
        exit;
    }
}
?>
