<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buyer's Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="sidebar bg-dark text-white" id="sidebar">
                <button class="btn btn-dark w-100 text-start toggle-button" onclick="toggleSidebar()">
                    &#9776; <span class="menu-text">Menu</span>
                </button>
                <ul class="nav flex-column mt-3">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">
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
                        <a class="nav-link text-white" href="my_bids.php">
                            <i class="bi bi-hammer"></i>
                            <span class="nav-text">My Bids</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">
                            <i class="bi bi-gear"></i>
                            <span class="nav-text">Account Settings</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Main Content -->
            <main class="main-content">
                <div class="container">
                    <header class="d-flex justify-content-between align-items-center py-3 mb-4 border-bottom">
                        <h1 class="h3">Welcome to Buyer's Dashboard</h1>
                    </header>
                    <div class="row g-4">
                        <div class="col-md-8">
                            <div class="row">
                                <!-- Overview Cards -->
                                <div class="col-md-4">
                                    <div class="card h-100">
                                        <img src="crop.jpg" class="card-img-top" alt="Crops">
                                        <div class="card-body">
                                            <h5 class="card-title">View Available Crops</h5>
                                            <p class="card-text">Browse available crops for bidding or purchase.</p>
                                            <a href="view_crops.php" class="btn btn-primary">View Crops</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card h-100">
                                        <img src="bids.jpg" class="card-img-top" alt="Bidding">
                                        <div class="card-body">
                                            <h5 class="card-title">My Bids</h5>
                                            <p class="card-text">Check your active bids and bid history.</p>
                                            <a href="my_bids.php" class="btn btn-primary">View Bids</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('collapsed');
        }
    </script>
</body>
</html>
