<?php

require 'db_connection.php';
session_start();
$seller_id = $_SESSION['user_id'];
$conn->query("UPDATE auctions SET status = 'closed' WHERE end_date < NOW() AND status = 'active'");
$query = "
    SELECT 
        crops.id,
        crops.crop_name AS crop_name,
        crops.season,
        crops.weight,
        crops.image,
        crops.starting_price,
        auctions.start_date,
        auctions.end_date,
        auctions.status AS auction_status,
        u.name AS highest_bidder,
        b.amount AS highest_bid
    FROM crops
    JOIN auctions ON crops.id = auctions.crop_id
    LEFT JOIN (
        SELECT crop_id, MAX(amount) AS max_bid
        FROM bids
        GROUP BY crop_id
    ) AS max_bids ON crops.id = max_bids.crop_id
    LEFT JOIN bids b ON b.crop_id = max_bids.crop_id AND b.amount = max_bids.max_bid
    LEFT JOIN users u ON b.user_id = u.id
    WHERE crops.seller_id = ?
    ORDER BY auctions.start_date DESC
";


$stmt = $conn->prepare($query);
$stmt->bind_param("i", $seller_id);
$stmt->execute();
$result = $stmt->get_result();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Auctions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styles.css">
</head>
<script>
    function updateCountdown() {
        const elements = document.querySelectorAll('.countdown');
        elements.forEach(el => {
            const endDate = new Date(el.getAttribute('data-end')).getTime();
            const now = new Date().getTime();
            const diff = endDate - now;

            if (diff <= 0) {
                el.innerHTML = "Auction ended";
                return;
            }

            const days = Math.floor(diff / (1000 * 60 * 60 * 24));
            const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((diff % (1000 * 60)) / 1000);

            el.innerHTML = `${days}d ${hours}h ${minutes}m ${seconds}s`;
        });
    }

    setInterval(updateCountdown, 1000);
    updateCountdown();
</script>

<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-3 col-lg-2 d-md-block bg-dark sidebar text-white position-fixed vh-100">
                <button class="btn btn-dark w-100 text-start" onclick="toggleSidebar()">&#9776; <span class="menu-text">Menu</span></button>
                <ul class="nav flex-column mt-3">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="seller_dashboard.php">
                            <i class="bi bi-house-door"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="list_crop.php">
                            <i class="bi bi-list-ul"></i>
                            List Crops
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white active" href="my_auctions.php">
                            <i class="bi bi-hammer"></i>
                            My Auctions
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="seller_settings.php">
                            <i class="bi bi-gear"></i>
                            Account Settings
                        </a>
                    </li>
                </ul>
            </nav>

            <main class="content">
                <div class="container mt-4">
                    <h2 class="text-center mb-5">My Listed Auctions</h2>
                    <div class="row">
                        <?php
                        if ($result->num_rows > 0) {
                            while ($crop = $result->fetch_assoc()) {
                        ?>
                            <div class="col-mb-4">
                                <div class="card">
                                    <img src="<?= htmlspecialchars($crop['image']) ?: 'default_crop.jpg' ?>" class="card-img-top" alt="Crop Image">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= htmlspecialchars($crop['crop_name']) ?></h5>
                                        <p class="card-text"><strong>Season:</strong> <?= htmlspecialchars($crop['season']) ?></p>
                                        <p class="card-text"><strong>Weight:</strong> <?= htmlspecialchars($crop['weight']) ?> kg</p>
                                        <p class="card-text"><strong>Starting Price:</strong> ₹<?= htmlspecialchars($crop['starting_price']) ?></p>
                                        <p class="card-text"><strong>Start:</strong> <?= date("d M Y, h:i A", strtotime($crop['start_date'])) ?></p>
                                        <p class="card-text">
                                            <strong>Ends in:</strong> 
                                            <span class="countdown" data-end="<?= htmlspecialchars($crop['end_date']) ?>"></span>
                                        </p>
                                        <p class="card-text">
                                            <strong>Status:</strong> 
                                            <span class="badge bg-<?= $crop['auction_status'] === 'active' ? 'success' : 'secondary' ?>">
                                                <?= ucfirst($crop['auction_status']) ?>
                                            </span>
                                        </p>
                                        <?php if (!empty($crop['highest_bid'])): ?>
    <p class="card-text">
        <strong>Highest Bid:</strong> ₹<?= htmlspecialchars($crop['highest_bid']) ?><br>
        <strong>Bidder:</strong> <?= htmlspecialchars($crop['highest_bidder']) ?>
    </p>
<?php else: ?>
    <p class="card-text text-muted">No bids yet.</p>
<?php endif; ?>

                                    </div>
                                </div>                   
                            </div>
                        <?php
                            }
                        } else {
                            echo "<p class='text-muted text-center'>You haven't listed any crops yet.</p>";
                        }
                        ?>
                    </div>
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
        .card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            background: #f8f9fa;
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        .card-body {
            padding: 20px;
        }
    </style>
</body>
</html>
