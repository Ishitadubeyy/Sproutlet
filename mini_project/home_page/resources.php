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
            max-width: 1000px;
            margin: 0 auto;
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

        .resources-intro {
            text-align: center;
            max-width: 800px;
            margin: 0 auto 40px;
        }
        
        /* Resources Categories */
        .resources-categories {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 40px;
        }
        
        .category-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
            transition: 0.3s;
        }
        
        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .category-image {
            height: 160px;
            background-color: #e9f7ef;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            color: #28A745;
        }
        
        .category-content {
            padding: 20px;
        }
        
        .category-content h3 {
            color: #28A745;
            margin-bottom: 10px;
        }
        
        .category-content p {
            font-size: 14px;
            margin-bottom: 15px;
            color: #555;
        }
        
        .category-btn {
            display: inline-block;
            padding: 8px 16px;
            background: transparent;
            color: #28A745;
            border: 1px solid #28A745;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            transition: 0.3s;
        }
        
        .category-btn:hover {
            background: #28A745;
            color: white;
        }
        
        /* Featured Resources */
        .featured-resources {
            margin-top: 60px;
        }
        
        .featured-title {
            text-align: center;
            font-size: 24px;
            margin-bottom: 30px;
            color: #111;
        }
        
        .resources-list {
            background: white;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }
        
        .resource-item {
            padding: 20px;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: center;
            gap: 15px;
            transition: 0.3s;
        }
        
        .resource-item:last-child {
            border-bottom: none;
        }
        
        .resource-item:hover {
            background: #f9f9f9;
        }
        
        .resource-icon {
            width: 50px;
            height: 50px;
            background: #e9f7ef;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #28A745;
            font-weight: bold;
            font-size: 20px;
        }
        
        .resource-info {
            flex: 1;
        }
        
        .resource-info h4 {
            margin-bottom: 5px;
        }
        
        .resource-info p {
            font-size: 14px;
            color: #555;
        }
        
        .resource-link {
            padding: 8px 16px;
            background: #28A745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            transition: 0.3s;
        }
        
        .resource-link:hover {
            background: #218838;
        }
        
        /* Newsletter */
        .newsletter {
            margin-top: 60px;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
            text-align: center;
        }
        
        .newsletter h3 {
            margin-bottom: 15px;
            color: #111;
        }
        
        .newsletter p {
            margin-bottom: 20px;
            color: #555;
            font-size: 14px;
        }
        
        .newsletter-form {
            display: flex;
            max-width: 500px;
            margin: 0 auto;
        }
        
        .newsletter-input {
            flex: 1;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 5px 0 0 5px;
            font-size: 16px;
        }
        
        .newsletter-btn {
            padding: 12px 20px;
            background: #28A745;
            color: white;
            border: none;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
            transition: 0.3s;
        }
        
        .newsletter-btn:hover {
            background: #218838;
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
            
            .resources-categories {
                grid-template-columns: 1fr;
            }
            
            .newsletter-form {
                flex-direction: column;
                gap: 10px;
            }
            
            .newsletter-input {
                border-radius: 5px;
            }
            
            .newsletter-btn {
                border-radius: 5px;
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
            <a href="resources.php" class="active">Resources</a>
            <a href="community.php">Community</a>
            <a href="contact.php">Contact</a>
        </nav>
        <button class="join-btn" onclick="document.location='start.php'">Join Now</button>
    </header>

    <!-- Main Content -->
    <div class="main-content">
        <h1 class="page-title">Agricultural Resources</h1>
        
        <div class="resources-intro">
            <p>Access our collection of valuable resources to enhance your farming knowledge, improve your practices, and connect with our agricultural community.</p>
        </div>
        
        <!-- Resource Categories -->
        <div class="resources-categories">
            <div class="category-card">
                <div class="category-image">🌱</div>
                <div class="category-content">
                    <h3>Farming Guides</h3>
                    <p>Comprehensive guides covering everything from soil preparation to harvest techniques for various crops.</p>
                    <a href="coming.php" class="category-btn">Browse Guides</a>
                </div>
            </div>
            
            <div class="category-card">
                <div class="category-image">📊</div>
                <div class="category-content">
                    <h3>Research & Data</h3>
                    <p>Latest agricultural research findings, statistics, and data-driven insights to inform your farming decisions.</p>
                    <a href="coming.php" class="category-btn">View Research</a>
                </div>
            </div>
            
            <div class="category-card">
                <div class="category-image">🎓</div>
                <div class="category-content">
                    <h3>Training & Courses</h3>
                    <p>Online courses, workshops, and training materials to help you develop new skills and knowledge.</p>
                    <a href="coming.php" class="category-btn">Start Learning</a>
                </div>
            </div>
        </div>
        
        <!-- Featured Resources -->
        <div class="featured-resources">
            <h2 class="featured-title">Featured Resources</h2>
            
            <div class="resources-list">
                <div class="resource-item">
                    <div class="resource-icon">📘</div>
                    <div class="resource-info">
                        <h4>Sustainable Farming Handbook</h4>
                        <p>A comprehensive guide to implementing eco-friendly farming practices for better yields and environmental protection.</p>
                    </div>
                    <a href="coming.php" class="resource-link">Download</a>
                </div>
                
                <div class="resource-item">
                    <div class="resource-icon">🎬</div>
                    <div class="resource-info">
                        <h4>Crop Rotation Masterclass</h4>
                        <p>Video series demonstrating effective crop rotation techniques to maximize soil health and productivity.</p>
                    </div>
                    <a href="coming.php" class="resource-link">Watch</a>
                </div>
                
                <div class="resource-item">
                    <div class="resource-icon">📝</div>
                    <div class="resource-info">
                        <h4>Agricultural Market Analysis</h4>
                        <p>Monthly report on market trends, price forecasts, and demand projections for major agricultural products.</p>
                    </div>
                    <a href="coming.php" class="resource-link">Read</a>
                </div>
                
                <div class="resource-item">
                    <div class="resource-icon">🛠️</div>
                    <div class="resource-info">
                        <h4>Farm Management Tools</h4>
                        <p>Collection of digital tools and templates to help you plan, track, and optimize your farming operations.</p>
                    </div>
                    <a href="coming.php" class="resource-link">Access</a>
                </div>
                
                <div class="resource-item">
                    <div class="resource-icon">📱</div>
                    <div class="resource-info">
                        <h4>CropBed Mobile App Guide</h4>
                        <p>Learn how to make the most of our mobile application for on-the-go farm management and monitoring.</p>
                    </div>
                    <a href="coming.php" class="resource-link">Get Started</a>
                </div>
            </div>
        </div>
        
        <!-- Newsletter -->
        <div class="newsletter">
            <h3>Stay Updated</h3>
            <p>Subscribe to our newsletter to receive the latest resources, farming tips, and agricultural news directly in your inbox.</p>
            <form class="newsletter-form">
                <input type="email" class="newsletter-input" placeholder="Your email address" required>
                <button type="submit" class="newsletter-btn">Subscribe</button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p class="copyright">&copy; 2025 Sproutlet. All rights reserved.</p>
    </footer>
</body>
</html>