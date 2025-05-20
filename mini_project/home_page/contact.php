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
        
        .contact-container {
            display: flex;
            gap: 30px;
            margin-top: 20px;
        }
        
        .contact-info {
            flex: 1;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
        }
        
        .contact-info h3 {
            color: #28A745;
            margin-bottom: 20px;
            font-size: 20px;
        }
        
        .info-item {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
        }
        
        .info-icon {
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
        
        .info-text {
            font-size: 14px;
        }
        
        .contact-form {
            flex: 2;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
            color: #555;
        }
        
        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            transition: 0.3s;
        }
        
        .form-control:focus {
            border-color: #28A745;
            outline: none;
        }
        
        textarea.form-control {
            height: 120px;
            resize: vertical;
        }
        
        .submit-btn {
            padding: 12px 24px;
            background: #28A745;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }
        
        .submit-btn:hover {
            background: #218838;
            transform: translateY(-2px);
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
            
            .contact-container {
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
            <a href="sol.php">Solutions</a>
            <a href="resources.php">Resources</a>
            <a href="community.php">Community</a>
            <a href="contact.php" class="active">Contact</a>
        </nav>
        <button class="join-btn" onclick="document.location='start.php'">Join Now</button>
    </header>

    <!-- Main Content -->
    <div class="main-content">
        <h1 class="page-title">Get In Touch</h1>
        
        <div class="contact-container">
            <div class="contact-info">
                <h3>Contact Information</h3>
                
                <div class="info-item">
                    <div class="info-icon">L</div>
                    <div class="info-text">
                        123 Farming Way<br>
                        Mumbai, AG 12345
                    </div>
                </div>
                
                <div class="info-item">
                    <div class="info-icon">P</div>
                    <div class="info-text">
                        +91 1602358795
                    </div>
                </div>
                
                <div class="info-item">
                    <div class="info-icon">E</div>
                    <div class="info-text">
                        info@sproutlet.com
                    </div>
                </div>
                
                <div class="info-item">
                    <div class="info-icon">H</div>
                    <div class="info-text">
                        Monday - Friday: 9am - 5pm<br>
                        Saturday: 10am - 2pm
                    </div>
                </div>
            </div>
            
            <div class="contact-form">
                <form action="#" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" id="subject" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" class="form-control" required></textarea>
                    </div>
                    
                    <button type="submit" class="submit-btn">Send Message</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p class="copyright">&copy; 2025 Sproutlet. All rights reserved.</p>
    </footer>
</body>
</html>