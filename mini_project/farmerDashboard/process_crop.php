<?php
session_start();
require 'db_connection.php';

if (!isset($_SESSION['user_id'])) {
    die("Unauthorized access.");
}

$seller_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $crop_name = $_POST['crop_name'];
    $season = $_POST['season'];
    $weight = $_POST['weight'];
    $starting_price = $_POST['starting_price'];
    $description = $_POST['description'];
    $auction_timeline = $_POST['auction_timeline'];

    $image = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        $imageExtension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        if (in_array(strtolower($imageExtension), $allowedExtensions)) {
            $targetDir = "C:/xampp/htdocs/farmerDashboard/uploads";
            $image = basename($_FILES["image"]["name"]);
            $targetFilePath = $targetDir . $image;
            move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath);
        } else {
            echo "Invalid image type. Allowed types: jpg, jpeg, png, gif.";
            exit();
        }
    }

    $stmt = $conn->prepare("
        INSERT INTO crops (seller_id, crop_name, season, weight, description, image, auction_timeline, starting_price, status)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'available')
    ");
    $stmt->bind_param("issdssis", $seller_id, $crop_name, $season, $weight, $description, $image, $auction_timeline, $starting_price);

    if ($stmt->execute()) {
        $crop_id = $conn->insert_id;

        $insertAuction = $conn->prepare("
            INSERT INTO auctions (crop_id, start_date, end_date, status)
            VALUES (?, NOW(), DATE_ADD(NOW(), INTERVAL ? HOUR), 'active')
        ");
        $insertAuction->bind_param("ii", $crop_id, $auction_timeline);
        $insertAuction->execute();

        header("Location: list_crop.php?success=1");
        exit();
    } else {
        header("Location: list_crop.php?error=" . urlencode($stmt->error));
        exit();
    }
}
?>
