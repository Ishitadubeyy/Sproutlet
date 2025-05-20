<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sproutlet - Crop Bidding Platform</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', 'Arial', sans-serif;
        }
        
        body {
            background: #F8F5F0;
            color: #222;
            line-height: 1.6;
        }
        
        /* Header */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 60px;
            background: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }
        
        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #28A745;
        }
        
        nav {
            display: flex;
            gap: 30px;
        }
        
        nav a {
            text-decoration: none;
            color: #222;
            font-weight: 500;
            padding: 8px 12px;
            transition: 0.3s;
            border-bottom: 2px solid transparent;
        }
        
        nav a:hover, nav a.active {
            color: #28A745;
            border-bottom: 2px solid #28A745;
        }
        
        .join-btn {
            padding: 10px 24px;
            border: none;
            background: #28A745;
            color: white;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
            font-weight: 600;
            transition: 0.3s;
        }
        
        .join-btn:hover {
            background: #218838;
            transform: translateY(-2px);
        }
        
        /* Main Content */
        .main-content {
            padding: 120px 5% 60px;
        }
        
        .page-title {
            text-align: center;
            margin-bottom: 40px;
            font-size: 36px;
            color: #111;
            position: relative;
        }
        
        .page-title:after {
            content: "";
            position: absolute;
            width: 60px;
            height: 4px;
            background: #28A745;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
        }
        
        .community-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }
        
        .community-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
            padding: 20px;
            transition: 0.3s;
        }
        
        .community-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .community-card h3 {
            color: #28A745;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .icon-placeholder {
            width: 30px;
            height: 30px;
            background: #e9f7ef;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #28A745;
            font-weight: bold;
        }
        
        .community-card p {
            color: #555;
            margin-bottom: 15px;
            font-size: 14px;
        }
        
        .community-btn {
            display: inline-block;
            padding: 8px 16px;
            background: #28A745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            transition: 0.3s;
        }
        
        .community-btn:hover {
            background: #218838;
            transform: translateY(-2px);
        }
        
        /* Events Section */
        .events-section {
            margin-top: 40px;
        }
        
        .events-section h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #111;
            font-size: 28px;
        }
        
        .events-container {
            display: flex;
            gap: 20px;
            overflow-x: auto;
            padding-bottom: 20px;
        }
        
        .event-card {
            flex: 0 0 300px;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
        }
        
        .event-date {
            background: #28A745;
            color: white;
            padding: 10px;
            text-align: center;
            font-weight: bold;
        }
        
        .event-content {
            padding: 15px;
        }
        
        .event-content h3 {
            margin-bottom: 10px;
            font-size: 18px;
        }
        
        .event-content p {
            color: #555;
            font-size: 14px;
            margin-bottom: 10px;
        }
        
        /* Footer */
        footer {
            padding: 30px 5%;
            background: #222;
            color: white;
            text-align: center;
        }
        
        .copyright {
            font-size: 14px;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            header {
                padding: 15px 20px;
                flex-direction: column;
                gap: 10px;
            }
            
            nav {
                gap: 10px;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
    <div class="logo">🌱 <strong>Sproutlet</strong></div>
        <nav>
            <a href="home.php">Home</a>
            <a href="sol.php">Solutions</a>
            <a href="resources.php">Resources</a>
            <a href="community.php" class="active">Community</a>
            <a href="contact.php">Contact</a>
        </nav>
        <button class="join-btn" onclick="document.location='start.php'">Join Now</button>
    </header>

    <!-- Main Content -->
    <div class="main-content">
        <h1 class="page-title">Join Our Community</h1>
        
        <div class="community-grid">
            <div class="community-card">
                <h3><span class="icon-placeholder">F</span>Farmer's Forum</h3>
                <p>Connect with fellow farmers, share experiences, and discuss best practices for crop bedding.</p>
                <a href="coming.php" class="community-btn">Join Forum</a>
            </div>
            
            <div class="community-card">
                <h3><span class="icon-placeholder">W</span>Webinars</h3>
                <p>Participate in our monthly webinars featuring experts in sustainable farming and crop management.</p>
                <a href="coming.php" class="community-btn">Register Now</a>
            </div>
            
            <div class="community-card">
                <h3><span class="icon-placeholder">M</span>Mentorship Program</h3>
                <p>Get paired with experienced farmers who can guide you through implementing new bedding techniques.</p>
                <a href="coming.php" class="community-btn">Apply Today</a>
            </div>
        </div>
        
        <div class="events-section">
            <h2>Upcoming Events</h2>
            <div class="events-container">
                <div class="event-card">
                    <div class="event-date">May 15, 2025</div>
                    <div class="event-content">
                        <h3>Sustainable Farming Workshop</h3>
                        <p>Learn hands-on techniques for implementing crop bedding in your farm.</p>
                        <a href="coming.php" class="community-btn">Register</a>
                    </div>
                </div>
                
                <div class="event-card">
                    <div class="event-date">June 22, 2025</div>
                    <div class="event-content">
                        <h3>Annual Farmer's Conference</h3>
                        <p>Join us for our annual gathering of agricultural innovators and experts.</p>
                        <a href="coming.php" class="community-btn">Register</a>
                    </div>
                </div>
                
                <div class="event-card">
                    <div class="event-date">July 10, 2025</div>
                    <div class="event-content">
                        <h3>Water Conservation Seminar</h3>
                        <p>Discover new techniques for reducing water usage with crop bedding.</p>
                        <a href="coming.php" class="community-btn">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p class="copyright">&copy; 2025 Sproutlet. All rights reserved.</p>
    </footer>
</body>
</html>