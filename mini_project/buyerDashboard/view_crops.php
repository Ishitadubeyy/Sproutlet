<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Available Crops</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
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
                        <a class="nav-link text-white active" href="view_crops.php">
                            <i class="bi bi-list-ul"></i>
                            <span class="nav-text">View Crops</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="my_bids.php">
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

            <main class="content">
                <div class="container mt-4">
                    <h2 class="text-center mb-4">Available Crops</h2>
                    <div class="row" id="available-crops">
                        <?php include 'fetch_crops.php'; ?>
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
        .expanded {
            margin-left: 60px;
            width: calc(100% - 60px);
        }
        .card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            background: #f8f9fa;
            width: 100%;
            max-width: 350px; /* Adjust as needed */
    margin: auto;
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        .card-body {
            padding: 20px;
        }
        #available-crops {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: start;
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
