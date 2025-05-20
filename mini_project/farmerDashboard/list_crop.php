<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Crops</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block bg-dark sidebar text-white position-fixed vh-100" id="sidebar">
                <button class="btn btn-dark w-100 text-start toggle-button" onclick="toggleSidebar()">
                    &#9776; <span class="menu-text">Menu</span>
                </button>
                <ul class="nav flex-column mt-3">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="seller_dashboard.php">
                            <i class="bi bi-house-door"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white active" href="list_crop.php">
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
                        <a class="nav-link text-white" href="seller_settings.php">
                            <i class="bi bi-gear"></i>
                            <span class="nav-text">Account Settings</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Main Content -->
            <main class="content">
                <div class="container mt-4">
                    <h2 class="text-center mb-4">List Your Crop</h2>
                    <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
                        <div class="success mx-auto text-center">Crop listed successfully!</div>
                    <?php elseif (isset($_GET['error'])): ?>
                        <div class="error mx-auto text-center">Error: <?= htmlspecialchars($_GET['error']) ?></div>
                    <?php endif; ?>
                    <div class="form-container">
                        <form action="process_crop.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="crop_name" class="form-label">Name of Crop</label>
                                    <input type="text" class="form-control" id="crop_name" name="crop_name" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="season" class="form-label">Season</label>
                                    <input type="text" class="form-control" id="season" name="season" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="weight" class="form-label">Weight (kg)</label>
                                    <input type="number" class="form-control" id="weight" name="weight" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="image" class="form-label">Upload Image</label>
                                    <input type="file" class="form-control" id="image" name="image" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="auction_timeline" class="form-label">Auction Timeline (Days)</label>
                                    <input type="number" class="form-control" id="auction_timeline" name="auction_timeline" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="starting_price" class="form-label">Starting Price (₹)</label>
                                    <input type="number" class="form-control" id="starting_price" name="starting_price" required>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary w-100">Publish Crop</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const content = document.querySelector('.content');

            if (sidebar.classList.contains('collapsed')) {
                sidebar.classList.remove('collapsed');
                content.classList.remove('expanded');
            } else {
                sidebar.classList.add('collapsed');
                content.classList.add('expanded');
            }
        }
    </script>

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
        .collapsed {
            width: 60px;
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

        .form-container {
            width: 100%;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .form-control {
            width: 100%;
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

        body {
            font-family: Arial, sans-serif;
        }
        .success, .error {
            margin: 20px auto;
            text-align: center;
            padding: 15px;
            width: 50%;
            border-radius: 10px;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        form {
            width: 60%;
            margin: 20px auto;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        input, textarea {
            padding: 10px;
            font-size: 16px;
        }
        input[type="submit"] {
            cursor: pointer;
            background-color: #28a745;
            color: white;
            border: none;
        }
    </style>

    <script>
    // Hide success or error message and clean URL after 3 seconds
        setTimeout(() => {
            const successBox = document.querySelector('.success');
            const errorBox = document.querySelector('.error');
        
            if (successBox) successBox.style.display = 'none';
            if (errorBox) errorBox.style.display = 'none';
        
            // Clear query params from the URL
            window.history.replaceState(null, null, window.location.pathname);
        }, 3000);
    </script>

</body>
</html>


