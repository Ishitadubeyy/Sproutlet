<?php
session_start();
require 'db_connection.php';

if (!isset($_SESSION['user_id'])) {
    die("User not logged in.");
}

$user_id = $_SESSION['user_id'];
$message = "";

// Fetch user data
$stmt = $conn->prepare("SELECT name, email, contact, address, photo FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    die("User not found.");
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $contact = trim($_POST['contact']);
    $address = trim($_POST['address']);
    $photo = trim($_POST['photo']);

    $update = $conn->prepare("UPDATE users SET name = ?, email = ?, contact = ?, address = ?, photo = ? WHERE id = ?");
    $update->bind_param("sssssi", $name, $email, $contact, $address, $photo, $user_id);

    if ($update->execute()) {
        $message = "Settings updated successfully!";
        $user['name'] = $name;
        $user['email'] = $email;
        $user['contact'] = $contact;
        $user['address'] = $address;
        $user['photo'] = $photo;
    } else {
        $message = "Error updating settings. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Settings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>
<div class="container-fluid">
        <div class="row">
            <nav class="col-md-3 col-lg-2 d-md-block bg-dark sidebar text-white position-fixed vh-100" id="sidebar">
                <button class="btn btn-dark w-100 text-start toggle-button" onclick="toggleSidebar()">&#9776; <span class="menu-text">Menu</span></button>
                <ul class="nav flex-column mt-3">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="seller_dashboard.php">
                            <i class="bi bi-house-door"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="list_crop.php">
                            <i class="bi bi-list-ul"></i>
                            <span class="nav-text">List Crops</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="my_auctions.php">
                            <i class="bi bi-hammer"></i>
                            <span class="nav-text">My Auctions</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white active" href="seller_settings.php">
                            <i class="bi bi-gear"></i>
                            <span class="nav-text">Account Settings</span>
                        </a>
                    </li>
                </ul>
            </nav>

        <main class="content">
            <div class="container mt-4">
                <h2 class="text-center mb-4">Account Settings</h2>

                <?php if (!empty($message)) echo "<div class='alert alert-success'>$message</div>"; ?>

                <form method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name:</label>
                        <input type="text" class="form-control" name="name" id="name" value="<?= htmlspecialchars($user['name']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" name="email" id="email" value="<?= htmlspecialchars($user['email']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="contact" class="form-label">Contact Number:</label>
                        <input type="text" class="form-control" name="contact" id="contact" value="<?= htmlspecialchars($user['contact']) ?>" maxlength="10" required>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address:</label>
                        <textarea class="form-control" name="address" id="address" required><?= htmlspecialchars($user['address']) ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="photo" class="form-label">Profile Photo URL:</label>
                        <input type="text" class="form-control" name="photo" id="photo" value="<?= htmlspecialchars($user['photo']) ?>">
                        <?php if (!empty($user['photo'])): ?>
                            <img src="<?= htmlspecialchars($user['photo']) ?>" alt="Profile Photo" class="img-thumbnail mt-2" style="width: 100px;">
                        <?php endif; ?>
                    </div>

                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </main>
    </div>
</div>

<style>
    .sidebar {
        height: 100vh;
        padding-top: 10px;
        transition: all 0.3s ease;
    }
    .sidebar .nav-link {
        padding: 10px 15px;
    }
    .sidebar .nav-link.active {
        background-color: #007bff;
        border-radius: 5px;
    }
    .content {
        margin-left: 250px;
        width: calc(100% - 250px);
        padding: 20px;
        transition: all 0.3s ease;
    }
    @media (max-width: 992px) {
        .content {
            margin-left: 200px;
            width: calc(100% - 200px);
        }
    }
    @media (max-width: 768px) {
        .content {
            margin-left: 0;
            width: 100%;
        }
    }
</style>
</body>
</html>
