<?php
session_start();
require 'db_connection.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'buyer') {
    header("Location: ../login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

$query = "
    SELECT bids.*, crops.crop_name, crops.image 
    FROM bids 
    JOIN crops ON bids.crop_id = crops.id 
    WHERE bids.user_id = ?
    ORDER BY bids.bid_time DESC
";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bids</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            height: 100vh;
            width: 250px; 
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
            margin-left: 240px; 
            width: calc(100% - 240px);
            padding: 20px;
            transition: all 0.3s ease;
        }

        .expanded {
            margin-left: 60px;
            width: calc(100% - 60px);
        }
        .card {
            border: none;
            width: 350px;
            flex: 1 1 auto;
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease-in-out;
            overflow: hidden;
            background-color: #fff;
            font-family: 'Segoe UI', sans-serif;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }
        .card-body {
            padding: 20px;
        }
        .card-title {
            font-size: 1.25rem;
            font-weight: 600;
        }
        .card-text {
            font-size: 0.95rem;
        }
        .text-muted {
            font-size: 1.1rem;
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
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-3 col-lg-2 d-md-block bg-dark sidebar text-white position-fixed vh-100" id="sidebar">
            <button class="btn btn-dark w-100 text-start toggle-button" onclick="toggleSidebar()">&#9776; <span class="menu-text">Menu</span></button>
            <ul class="nav flex-column mt-3">
                <li class="nav-item">
                    <a class="nav-link text-white" href="buyer_dashboard.php">
                        <i class="bi bi-house-door"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="view_crops.php">
                        <i class="bi bi-list-ul"></i>
                        <span class="nav-text">View Crops</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white active" href="my_bids.php">
                        <i class="bi bi-hammer"></i>
                        <span class="nav-text">My Bids</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="buyer_settings.php">
                        <i class="bi bi-gear"></i>
                        <span class="nav-text">Account Settings</span>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Main Content -->
        <main class="content">
            <div class="container mt-4">
                <h2 class="text-center mb-5">My Bids</h2>

                <!-- All Bids Section -->
                <h3 class="mb-4">All Bids</h3>
                <div class="row g-4">
                    <?php if ($result->num_rows > 0): ?>
                        <?php while ($bid = $result->fetch_assoc()): ?>
                            <div class="col-mb-4">
                                <div class="card h-100">
                                    <img src="<?= htmlspecialchars($bid['image']) ?: 'default_crop.jpg' ?>" class="card-img-top">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= htmlspecialchars($bid['crop_name']) ?></h5>
                                        <p class="card-text"><strong>Your Bid:</strong> ₹<?= htmlspecialchars($bid['amount']) ?></p>
                                        <p class="card-text"><strong>Status:</strong> 
                                            <span class="badge bg-<?= 
                                                $bid['status'] === 'won' || $bid['status'] === 'active' ? 'success' : 
                                                ($bid['status'] === 'lost' ? 'danger' : 'secondary') 
                                            ?>">
                                                <?= htmlspecialchars(ucfirst($bid['status'])) ?>
                                            </span>
                                        </p>
                                        <p class="card-text text-muted"><strong>Placed On:</strong> <?= date("d M Y, h:i A", strtotime($bid['bid_time'])) ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <div class="col-12">
                            <p class="text-center text-muted">You haven't placed any bids yet.</p>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Auctions You've Won Subsection -->
                <h3 class="mb-4 mt-5">Auctions You've Won</h3>
                <div class="row g-4">
                    <?php
                    // Fetching the auctions that the user has won
                    $won_bids_query = "
                        SELECT bids.*, crops.crop_name, crops.image 
                        FROM bids 
                        JOIN crops ON bids.crop_id = crops.id 
                        WHERE bids.user_id = ? AND bids.status = 'won'
                        ORDER BY bids.bid_time DESC
                    ";
                    $stmt = $conn->prepare($won_bids_query);
                    $stmt->bind_param("i", $user_id);
                    $stmt->execute();
                    $won_bids_result = $stmt->get_result();

                    if ($won_bids_result->num_rows > 0): ?>
                        <?php while ($won_bid = $won_bids_result->fetch_assoc()): ?>
                            <div class="col-md-4 mb-4">
                                <div class="card h-100">
                                    <img src="<?= htmlspecialchars($won_bid['image']) ?: 'default_crop.jpg' ?>" class="card-img-top">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= htmlspecialchars($won_bid['crop_name']) ?></h5>
                                        <p class="card-text"><strong>Your Bid:</strong> ₹<?= htmlspecialchars($won_bid['amount']) ?></p>
                                        <p class="card-text"><strong>Status:</strong> 
                                            <span class="badge bg-success"><?= htmlspecialchars(ucfirst($won_bid['status'])) ?></span>
                                        </p>
                                        <p class="card-text text-muted"><strong>Placed On:</strong> <?= date("d M Y, h:i A", strtotime($won_bid['bid_time'])) ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <div class="col-12">
                            <p class="text-center text-muted">You haven't won any auctions yet.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </main>
    </div>
</div>

<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const content = document.querySelector('.content');
        sidebar.classList.toggle('collapsed');
        content.classList.toggle('expanded');
    }
</script>
</body>
</html>
