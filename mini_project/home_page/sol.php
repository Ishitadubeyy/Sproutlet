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
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
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
        
        nav a:hover {
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
        
        /* Hero Section */
        .hero {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 150px 10% 100px;
            gap: 40px;
        }
        
        .content {
            max-width: 50%;
        }
        
        .badge {
            display: inline-block;
            background: rgba(40, 167, 69, 0.1);
            color: #28A745;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: 500;
            margin-bottom: 24px;
        }
        
        h1 {
            font-size: 48px;
            font-weight: bold;
            margin-bottom: 24px;
            line-height: 1.2;
            color: #111;
        }
        
        .subtext {
            font-size: 18px;
            color: #555;
            margin-bottom: 32px;
        }
        
        /* Solutions Specific */
        .solutions-container {
            padding: 80px 10%;
        }
        
        .section-title {
            position: relative;
            display: inline-block;
            margin-bottom: 50px;
            font-size: 36px;
            color: #111;
        }
        
        .section-title:after {
            content: "";
            position: absolute;
            width: 60px;
            height: 4px;
            background: #28A745;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
        }
        
        .solutions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }
        
        .solution-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: 0.3s;
        }
        
        .solution-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .solution-img {
    width: 100%;
    height: 200px;  
    background-color: #f0f0f0;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}
.solution-img img {
    width: 100%;  
    height: 100%; 
    object-fit: cover;  
}
        
        .solution-content {
            padding: 25px;
        }
        
        .solution-content h3 {
            color: #28A745;
            margin-bottom: 15px;
        }
        
        .solution-content p {
            color: #555;
            margin-bottom: 20px;
        }
        
        .learn-more {
            display: inline-block;
            padding: 10px 20px;
            background: #28A745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: 500;
            transition: 0.3s;
        }
        
        .learn-more:hover {
            background: #218838;
            transform: translateY(-2px);
        }
        
        /* Case Studies */
        .case-studies {
            background: #f8f9fa;
            padding: 80px 10%;
            text-align: center;
        }
        
        .case-study-container {
            display: flex;
            gap: 30px;
            margin-top: 40px;
            overflow-x: auto;
            padding-bottom: 20px;
        }
        
        .case-study {
            flex: 0 0 350px;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        .case-study-img {
    width: 100%;  
    height: 200px;  
    background-color: #f0f0f0;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

.case-study-img img {
    width: 100%;  
    height: 100%; 
    object-fit: cover;  
}
        
        .case-study-content {
            padding: 25px;
            text-align: left;
        }
        
        .case-study-content h3 {
            color: #333;
            margin-bottom: 10px;
        }
        
        .case-study-content p {
            color: #666;
            margin-bottom: 15px;
        }
        
        /* CTA Section */
        .cta {
            background: #28A745;
            padding: 80px 10%;
            text-align: center;
            color: white;
        }
        
        .cta h2 {
            font-size: 36px;
            margin-bottom: 20px;
        }
        
        .cta p {
            max-width: 700px;
            margin: 0 auto 30px;
            font-size: 18px;
        }
        
        .cta-button {
            background: white;
            color: #28A745;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
        }
        
        .cta-button:hover {
            background: #f0f0f0;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        /* Footer */
        footer {
            padding: 60px 10% 30px;
            background: #222;
            color: white;
        }
        
        .footer-content {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 40px;
            margin-bottom: 40px;
        }
        
        .footer-section {
            flex: 1;
            min-width: 200px;
        }
        
        .footer-section h3 {
            margin-bottom: 20px;
            color: #28A745;
        }
        
        .footer-links {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        
        .footer-links a {
            color: #ddd;
            text-decoration: none;
            transition: 0.3s;
        }
        
        .footer-links a:hover {
            color: #28A745;
        }
        
        .social-icons {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }
        
        .social-icons a {
            display: inline-block;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: 0.3s;
            text-decoration: none;
        }
        
        .social-icons a:hover {
            background: #28A745;
            transform: translateY(-3px);
        }
        
        .footer-bottom {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        /* Responsive Design */
        @media (max-width: 992px) {
            .hero {
                flex-direction: column;
                padding-top: 120px;
            }
            
            .content {
                max-width: 100%;
                text-align: center;
            }
            
            header {
                padding: 15px 20px;
            }
            
            nav {
                gap: 15px;
            }
            
            .solutions-grid {
                grid-template-columns: 1fr;
            }
        }
        
        @media (max-width: 768px) {
            h1 {
                font-size: 36px;
            }
            
            .footer-content {
                flex-direction: column;
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
            <a href="sol.php" style="color: #28A745; border-bottom: 2px solid #28A745;">Solutions</a>
            <a href="resources.php">Resources</a>
            <a href="community.php">Community</a>
            <a href="contact.php">Contact</a>
        </nav>
        <button class="join-btn" onclick="document.location='start.php'">Join Now</button>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="content">
            <div class="badge">Innovative Farming Solutions</div>
            <h1>Transform Your Crop Productivity</h1>
            <p class="subtext">Discover our range of sustainable bedding solutions designed to enhance growth, reduce water usage, and maximize your harvest.</p>
        </div>
        <div class="image-container">
            <img src="https://nkosh.in/UploadDoc/Blog/20250401051959_0.png" alt="Crop Bidding Solutions">
        </div>
    </section>

    <!-- Solutions Section -->
    <section class="solutions-container">
        <h2 class="section-title" style="text-align: center;">Our Solutions</h2>
        <div class="solutions-grid">
            <div class="solution-card">
                <div class="solution-img">
                    <img src="https://i.pinimg.com/736x/9a/fa/1f/9afa1f5d5bf3ad170726080c9495bcdf.jpg" alt="Organic Bedding">
                </div>
                <div class="solution-content">
                    <h3>Organic Crop Bedding</h3>
                    <p>100% natural, biodegradable crop bedding made from sustainable materials. Perfect for organic farming and environmentally conscious growers.</p>
                    <a href="#" class="learn-more">Learn More</a>
                </div>
            </div>
            
            <div class="solution-card">
                <div class="solution-img">
                    <img src="https://ipm.cahnr.uconn.edu/wp-content/uploads/sites/3216/2021/07/greenhouse-banner.png" alt="Water Retention Bedding">
                </div>
                <div class="solution-content">
                    <h3>Water Retention System</h3>
                    <p>Advanced bedding technology that reduces water consumption by up to 60% while maintaining optimal moisture levels for your crops.</p>
                    <a href="#" class="learn-more">Learn More</a>
                </div>
            </div>
            
            <div class="solution-card">
                <div class="solution-img">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTWkNSuMeeJqxy7leJy8SEGjaJ0F4_jE6fnUw&s" alt="Nutrient-Enhanced Bedding">
                </div>
                <div class="solution-content">
                    <h3>Nutrient-Enhanced Bedding</h3>
                    <p>Specially formulated bedding infused with essential nutrients to boost crop health, yield, and resistance to diseases.</p>
                    <a href="#" class="learn-more">Learn More</a>
                </div>
            </div>
            
            <div class="solution-card">
                <div class="solution-img">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSEbz7aRN2ewoR9iDNLqql25A4Z9eXeeA51IA&s" alt="Indoor Growing Solutions">
                </div>
                <div class="solution-content">
                    <h3>Indoor Growing Solutions</h3>
                    <p>Complete bedding systems designed specifically for indoor and vertical farming operations with controlled environment agriculture.</p>
                    <a href="#" class="learn-more">Learn More</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Case Studies -->
    <section class="case-studies">
        <h2 class="section-title">Success Stories</h2>
        <div class="case-study-container">
            <div class="case-study">
                <div class="case-study-img">
                    <img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/05/52/c2/84/green-valley-farm.jpg?w=1200&h=-1&s=1" alt="Farm Case Study">
                </div>
                <div class="case-study-content">
                    <h3>Green Valley Farms</h3>
                    <p>Increased tomato yield by 35% and reduced water usage by 50% using our Water Retention Bedding System.</p>
                    <a href="#" class="learn-more">Read Case Study</a>
                </div>
            </div>
            
            <div class="case-study">
                <div class="case-study-img">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRx4zd1BJa_hkV0dPjcNYB1yfDA3u6QZeHM1Q&s" alt="Organic Farm">
                </div>
                <div class="case-study-content">
                    <h3>Sunrise Organic Co-op</h3>
                    <p>Transitioned to 100% sustainable farming with our Organic Bedding, improving soil health and earning premium prices.</p>
                    <a href="#" class="learn-more">Read Case Study</a>
                </div>
            </div>
            
            <div class="case-study">
                <div class="case-study-img">
                    <img src="https://images.forbesindia.com/media/images/2021/Jul/img_163501_urbanfarms.jpg" alt="Urban Farm">
                </div>
                <div class="case-study-content">
                    <h3>Urban Greens Project</h3>
                    <p>Revolutionized urban farming with our Indoor Growing Solutions, producing fresh vegetables year-round.</p>
                    <a href="#" class="learn-more">Read Case Study</a>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta">
        <h2>Ready to Transform Your Crop Production?</h2>
        <p>Join thousands of farmers who have improved their yields and sustainability with our innovative bedding solutions.</p>
        <button class="cta-button" onclick="document.location='start.php'">Get Started Today</button>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>CropBed</h3>
                <p>Innovative crop bedding solutions for sustainable and productive farming.</p>
                <div class="social-icons">
                    <a href="#"><i>f</i></a>
                    <a href="#"><i>t</i></a>
                    <a href="#"><i>in</i></a>
                    <a href="#"><i>ig</i></a>
                </div>
            </div>
            
            <div class="footer-section">
                <h3>Quick Links</h3>
                <div class="footer-links">
                    <a href="#">Home</a>
                    <a href="#">Solutions</a>
                    <a href="resources.html">Resources</a>
                    <a href="community.html">Community</a>
                    <a href="contact.html">Contact</a>
                </div>
            </div>
            
            <div class="footer-section">
                <h3>Contact Us</h3>
                <div class="footer-links">
                    <a href="#">info@cropbed.com</a>
                    <a href="#">+91 7894561235</a>
                    <a href="#">123 Farming Way, Mumbai, AG 12345</a>
                </div>
            </div>
            
            <div class="footer-section">
                <h3>Newsletter</h3>
                <p>Subscribe to our newsletter for the latest updates and tips.</p>
                <form action="#" style="margin-top: 15px;">
                    <input type="email" placeholder="Your Email" style="width: 100%; padding: 10px; margin-bottom: 10px; border-radius: 5px; border: none;">
                    <button class="join-btn" style="width: 100%;">Subscribe</button>
                </form>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; 2025 Sproutlet. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>