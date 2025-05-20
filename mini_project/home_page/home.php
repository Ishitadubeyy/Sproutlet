<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sproutlet - Crop Bidding Platform</title>
    <style>
        /* General Reset */
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
        
        .email-container {
            display: flex;
            gap: 10px;
            margin-bottom: 16px;
        }
        
        input {
            padding: 14px;
            width: 300px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        
        .start-trial {
            background: #28A745;
            color: white;
            border: none;
            padding: 14px 28px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            transition: 0.3s;
        }
        
        .start-trial:hover {
            background: #218838;
            transform: translateY(-2px);
        }
        
        .trial-text {
            color: #666;
            font-size: 14px;
            margin-bottom: 24px;
        }
        
        .rating {
            background: white;
            padding: 15px 25px;
            border-radius: 8px;
            display: inline-block;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }
        
        .rating span {
            font-weight: bold;
            font-size: 18px;
        }
        
        .image-container {
            flex: 1;
            display: flex;
            justify-content: center;
        }
        
        .image-container img {
            width: 100%;
            max-width: 500px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        
        /* How It Works */
        .how-it-works {
            text-align: center;
            padding: 80px 10%;
            background: white;
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
        
        .steps {
            display: flex;
            justify-content: center;
            gap: 40px;
            margin-top: 30px;
        }
        
        .step {
            flex: 1;
            text-align: center;
            background: #F8F9FA;
            padding: 40px 20px;
            border-radius: 10px;
            transition: 0.3s;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        .step:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .step img {
            width: 80px;
            margin-bottom: 20px;
        }
        
        .step h3 {
            margin-bottom: 15px;
            color: #28A745;
        }
        
        /* Features */
        .features {
            text-align: center;
            padding: 80px 10%;
            background: #f8f5f0;
        }
        
        .feature-list {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-top: 40px;
            flex-wrap: wrap;
        }
        
        .feature {
            flex: 1;
            min-width: 280px;
            text-align: left;
            padding: 30px;
            background: #FFF;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: 0.3s;
            border-bottom: 4px solid transparent;
        }
        
        .feature:hover {
            transform: translateY(-5px);
            border-bottom: 4px solid #28A745;
        }
        
        .feature h3 {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            color: #333;
        }
        
        /* Stats Section */
        .stats {
            background: linear-gradient(rgba(40, 167, 69, 0.9), rgba(40, 167, 69, 0.9)), url('/api/placeholder/1200/400') center/cover;
            padding: 80px 10%;
            color: white;
            text-align: center;
        }
        
        .stats-container {
            display: flex;
            justify-content: space-around;
            margin-top: 50px;
            flex-wrap: wrap;
        }
        
        .stat-item {
            padding: 20px;
        }
        
        .stat-number {
            font-size: 48px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        
        /* Testimonials */
        .testimonials {
            text-align: center;
            padding: 80px 10%;
            background: white;
        }
        
        .testimonial-container {
            display: flex;
            gap: 30px;
            margin-top: 40px;
            justify-content: center;
            flex-wrap: wrap;
        }
        
        .review {
            flex: 1;
            min-width: 300px;
            background: #F8F9FA;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            position: relative;
            margin-top: 30px;
        }
        
        .review img {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            position: absolute;
            top: -35px;
            left: 50%;
            transform: translateX(-50%);
            border: 5px solid white;
        }
        
        .review p {
            font-style: italic;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        
        .review-name {
            font-weight: bold;
            color: #28A745;
        }
        
        .review-title {
            font-size: 14px;
            color: #666;
        }
        
        /* FAQ Section */
        .faq {
            padding: 80px 10%;
            background: #F8F5F0;
        }
        
        .faq h2 {
            text-align: center;
            margin-bottom: 50px;
        }
        
        .faq-container {
            max-width: 800px;
            margin: 0 auto;
        }
        
        details {
            background: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 15px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
            cursor: pointer;
            transition: 0.3s;
        }
        
        details:hover {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        summary {
            font-weight: 600;
            margin-bottom: 10px;
            outline: none;
        }
        
        details p {
            padding: 10px;
            color: #555;
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
            
            .steps {
                flex-direction: column;
            }
            
            .feature-list {
                flex-direction: column;
            }
            
            header {
                padding: 15px 20px;
            }
            
            nav {
                gap: 15px;
            }
        }
        
        @media (max-width: 768px) {
            h1 {
                font-size: 36px;
            }
            
            .email-container {
                flex-direction: column;
            }
            
            input, .start-trial {
                width: 100%;
            }
            
            .footer-content {
                flex-direction: column;
            }
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <header>
        <div class="logo">🌱 <strong>Sproutlet</strong></div>
        <nav>
            <a href="home.php">Home</a>
            <a href="sol.php">Solutions</a>
            <a href="resources.php">Resources</a>
            <a href="community.php">Community</a>
            <a href="contact.php">Contact</a>
        </nav>
        <button class="join-btn" onclick="document.location='start.php'">Join Now</button>
    </header>

    <section class="hero">
        <div class="content">
            <div class="badge">✅ Trusted by 5000+ farmers and traders</div>
            <h1>Empowering Farmers,<br>Connecting Buyers</h1>
            <p class="subtext">A seamless and transparent crop bidding platform for better pricing and sustainable trade across global markets.</p>
            
            <div class="email-container">
                <input type="email" placeholder="Enter your email address">
                <button class="start-trial">Start Free Trial</button>
            </div>

            <p class="trial-text">Start your 30-day free trial today. No credit card required.</p>

            <div class="rating">
                ⭐⭐⭐⭐⭐ <br>
                <span>4.8/5.0</span> <br>
                <small>Based on 365+ verified reviews</small>
            </div>
        </div>

        <div class="image-container">
            <img src="https://st5.depositphotos.com/39672126/64699/i/450/depositphotos_646990572-stock-photo-asian-male-farmer-holding-hands.jpg" alt="Farmers shaking hands">
        </div>
    </section>

    <!-- Stats Section (New) -->
    <section class="stats">
        <h2 class="section-title" style="color: white;">Sproutlet Impact</h2>
        <div class="stats-container">
            <div class="stat-item">
                <div class="stat-number">5,000+</div>
                <div>Active Farmers</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">120+</div>
                <div>Countries Served</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">$50M+</div>
                <div>Trading Volume</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">15%</div>
                <div>Average Price Increase</div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="how-it-works">
        <h2 class="section-title">How It Works</h2>
        <div class="steps">
            <div class="step">
                <img src="signup.png" alt="Sign Up">
                <h3>Sign Up</h3>
                <p>Create your account in minutes and verify your identity to get started on your farming journey.</p>
            </div>
            <div class="step">
                <img src="create.png" alt="Create Profile">
                <h3>Create Profile</h3>
                <p>Fill in your details, crop specialties, and set your preferences for seamless trading experiences.</p>
            </div>
            <div class="step">
                <img src="connect.png" alt="Connect with Buyers">
                <h3>Connect & Trade</h3>
                <p>Engage in secure and fair transactions with verified buyers from around the world.</p>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <h2 class="section-title">Why Choose Sproutlet?</h2>
        <div class="feature-list">
            <div class="feature">
                <h3>🌍 Global Marketplace</h3>
                <p>Connect with buyers and sellers worldwide, expanding your reach beyond local markets and opening new opportunities for growth and diversification.</p>
            </div>
            <div class="feature">
                <h3>🔒 Secure Transactions</h3>
                <p>Guaranteed payments and secure bidding system with escrow protection ensures that both buyers and sellers are protected throughout the process.</p>
            </div>
            <div class="feature">
                <h3>📊 Real-time Data</h3>
                <p>Stay updated with live market trends and pricing insights to make informed decisions about when to sell and at what price point.</p>
            </div>
            <div class="feature">
                <h3>📱 Mobile App</h3>
                <p>Manage your farm business on the go with our intuitive mobile application available for both iOS and Android devices.</p>
            </div>
            <div class="feature">
                <h3>🚚 Logistics Support</h3>
                <p>Integrated shipping and logistics solutions to help you deliver crops efficiently and track shipments in real-time.</p>
            </div>
            <div class="feature">
                <h3>🌱 Sustainability Tracking</h3>
                <p>Document and showcase your sustainable farming practices to attract premium buyers and access new market segments.</p>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials">
        <h2 class="section-title">What Our Users Say</h2>
        <div class="testimonial-container">
            <div class="review">
                <img src="farmer1.png" alt="Farmer">
                <p>"Sproutlet has completely transformed how I sell my crops. The platform is intuitive, and I've seen a 20% increase in my profit margins since joining!"</p>
                <div class="review-name">Rajesh Kumar</div>
                <div class="review-title">Rice Farmer, India</div>
            </div>
            <div class="review">
                <img src="farmer2.png" alt="Buyer">
                <p>"As a grain trader, I appreciate the transparency and fair pricing on this platform. The verification system ensures I'm always dealing with legitimate farmers."</p>
                <div class="review-name">Michelle Rodriguez</div>
                <div class="review-title">Grain Trader, Brazil</div>
            </div>
            <div class="review">
                <img src="farmer3.png" alt="Cooperative">
                <p>"Our farming cooperative joined Sproutlet last year, and it's been a game-changer. The bulk selling features and analytics tools have helped us maximize our returns."</p>
                <div class="review-name">John Mutai</div>
                <div class="review-title">Cooperative Leader, Kenya</div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq">
        <h2 class="section-title">Frequently Asked Questions</h2>
        <div class="faq-container">
            <details>
                <summary>How do I sign up for Sproutlet?</summary>
                <p>Simply click the "Join Us" button at the top of the page and follow the registration process. You'll need to provide basic information and verify your identity to ensure a secure marketplace for everyone.</p>
            </details>
            <details>
                <summary>Are transactions on Sproutlet secure?</summary>
                <p>Yes! We use advanced encryption, secure payment methods, and an escrow system that releases payment only when both parties confirm the transaction is complete.</p>
            </details>
            <details>
                <summary>Is there a fee for using Sproutlet?</summary>
                <p>Signing up is completely free. We charge a small commission (3-5%) only when a successful transaction is completed. There are no hidden fees or monthly subscriptions.</p>
            </details>
            <details>
                <summary>How does the bidding process work?</summary>
                <p>Farmers list their available crops with details and minimum prices. Buyers can place bids, and farmers can accept the best offer. Alternatively, buyers can use the "Buy Now" option if available.</p>
            </details>
            <details>
                <summary>Can I use Sproutlet on my mobile device?</summary>
                <p>Yes, Sproutlet is fully responsive and works on all devices. We also offer dedicated mobile apps for iOS and Android for an enhanced experience in the field.</p>
            </details>
        </div>
    </section>

    <!-- Call to Action Section (New) -->
    <section class="cta">
        <h2>Ready to Transform Your Agricultural Business?</h2>
        <p>Join thousands of farmers and buyers who have already discovered the benefits of digital crop trading with Sproutlet.</p>
        <button class="cta-button" onclick="document.location='start.php'">GET STARTED NOW</button>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>About Sproutlet</h3>
                <p>We're on a mission to create fair and sustainable agricultural markets worldwide through technology and transparency.</p>
                <div class="social-icons">
                    <a href="#">FB</a>
                    <a href="#">TW</a>
                    <a href="#">IG</a>
                    <a href="#">LI</a>
                </div>
            </div>
            <div class="footer-section">
                <h3>Quick Links</h3>
                <div class="footer-links">
                    <a href="#">Home</a>
                    <a href="#">About Us</a>
                    <a href="#">Services</a>
                    <a href="#">Success Stories</a>
                    <a href="#">Blog</a>
                </div>
            </div>
            <div class="footer-section">
                <h3>Support</h3>
                <div class="footer-links">
                    <a href="#">Help Center</a>
                    <a href="#">Contact Us</a>
                    <a href="#">FAQ</a>
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms of Service</a>
                </div>
            </div>
            <div class="footer-section">
                <h3>Contact</h3>
                <p>123 Farm Road, Suite 101<br>San Francisco, CA 94107</p>
                <p>Email: hello@sproutlet.com<br>Phone: +1 (555) 123-4567</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 Sproutlet. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>