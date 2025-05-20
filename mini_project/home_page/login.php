<?php
session_start();
$loginError = '';
require 'db_connection.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $userCaptcha = $_POST['captcha'];
    $generatedCaptcha = $_POST['generated_captcha'];

    if ($userCaptcha !== $generatedCaptcha) {
        $loginError = "CAPTCHA is incorrect.";
    } else {
        // Prepare and query DB
        $stmt = $conn->prepare("SELECT id, name, password, role FROM users WHERE name = ?");
        $stmt->bind_param("s", $user);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            if (password_verify($pass, $row['password'])) {
                $_SESSION['user_id'] = $row['id'];
$_SESSION['username'] = $row['name'];
$_SESSION['role'] = $row['role'];

// Redirect based on role
switch ($row['role']) {
    case 'farmer':
        header("Location: http://localhost/mini_project/farmerDashboard/seller_dashboard.php");
        break;
    case 'buyer':
        header("Location: http://localhost/mini_project/buyerDashboard/buyer_dashboard.php");
        break;
    default:
        
        header("Location: dashboard.php");
        break;
}
exit();

            } else {
                $loginError = "Invalid password.";
            }
        } else {
            $loginError = "User not found.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: url('https://i.pinimg.com/originals/04/77/76/0477764895b3b7f5a1996a3776716ac2.gif') no-repeat center center/cover;
            font-family: Arial, sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login {
            background: rgba(255, 255, 255, 0.35);
            backdrop-filter: blur(10px);
            padding: 40px;
            width: 400px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .login h2 {
            text-align: center;
            margin-bottom: 10px;
            font-size: 28px;
            color: #111;
        }

        .slogan {
            text-align: center;
            font-size: 14px;
            margin-bottom: 20px;
            color: #555;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
            color: #222;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }

        .captcha-container {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 10px;
        }

        .captcha-box {
            background: #fff;
            padding: 10px 15px;
            font-size: 18px;
            font-weight: bold;
            border-radius: 5px;
            flex-grow: 1;
            text-align: center;
            border: 1px solid #ccc;
        }

        .refresh-btn {
            background: #007bff;
            border: none;
            color: white;
            padding: 8px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        #captcha-input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 8px;
            border: 1px solid #ccc;
            margin-bottom: 15px;
        }

        .button {
            background-color: #6ce967;
            border: none;
            width: 100%;
            padding: 12px;
            border-radius: 40px;
            font-size: 18px;
            color: #111;
            cursor: pointer;
            transition: 0.3s;
        }

        .button:hover {
            transform: scale(1.05);
        }

        .login-footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }

        .login-footer a {
            color: #00a651;
            font-weight: bold;
            text-decoration: none;
        }

        .error {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>

    <script>
        function generateCaptcha() {
            let captcha = '';
            const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            for (let i = 0; i < 6; i++) {
                captcha += chars.charAt(Math.floor(Math.random() * chars.length));
            }
            document.getElementById('cap').innerText = captcha;
            document.getElementById('generated_captcha').value = captcha;
        }

        window.onload = generateCaptcha;
    </script>
</head>
<body>
    <div class="login">
        <h2>Log In</h2>
        <p class="slogan">Welcome back! Secure access to your world.</p>

        <?php if ($loginError): ?>
            <div class="error"><?= $loginError ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" name="username" required>
            </div>

            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" name="password" required>
            </div>

            <div class="captcha-container">
                <div class="captcha-box" id="cap"></div>
                <button type="button" class="refresh-btn" onclick="generateCaptcha()">🔄</button>
            </div>

            <input type="hidden" id="generated_captcha" name="generated_captcha">
            <input type="text" id="captcha-input" name="captcha" placeholder="Enter CAPTCHA" required>

            <button class="button" type="submit">Log In</button>
        </form>

        <div class="login-footer">
            <p>Don't have an account? <a href="register.php">Sign up</a></p>
        </div>
    </div>
</body>
</html>