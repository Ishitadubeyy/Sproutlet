<?php
// Initialize error array
$errors = [];

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Personal Information Validation
    if (empty($_POST['name'])) {
        $errors['name'] = 'Full name is required';
    } elseif (!preg_match('/^[a-zA-Z\s]+$/', $_POST['name'])) {
        $errors['name'] = 'Invalid name. Please use only letters and spaces.';
    }
    

    if (empty($_POST['email'])) {
        $errors['email'] = 'Email is required';
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid email format';
    }

    if (empty($_POST['contact'])) {
        $errors['contact'] = 'Contact number is required';
    } elseif (!preg_match('/^[0-9]{10}$/', $_POST['contact'])) {
        $errors['contact'] = 'Invalid contact number. Please enter a 10-digit number';
    }

    if (empty($_POST['password'])) {
        $errors['password'] = 'Password is required';
    } elseif (strlen($_POST['password']) < 6) {
        $errors['password'] = 'Password should be at least 6 characters long';
    }

    if ($_POST['password'] !== $_POST['confirmPassword']) {
        $errors['confirmPassword'] = 'Passwords do not match';
    }

    if (empty($_POST['role'])) {
        $errors['role'] = 'Please select a role';
    }

    // Address Validation
    if (empty($_POST['address'])) {
        $errors['address'] = 'Address is required';
    }

    // Photo upload validation
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $photo = $_FILES['photo'];
        $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
        if (!in_array($photo['type'], $allowedTypes)) {
            $errors['photo'] = 'Only JPG, JPEG, and PNG images are allowed';
        }

        if ($photo['size'] > 5000000) { 
            $errors['photo'] = 'Image size should not exceed 5MB';
        }
    } elseif (empty($_FILES['photo']['name'])) {
        $errors['photo'] = 'Please upload a photo';
    }

    // If there are no errors, proceed to save the data
    if (empty($errors)) {
        
        $photoPath = '';
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
            $photoPath = 'C:\xampp\htdocs\users\user' . basename($_FILES['photo']['name']);
            move_uploaded_file($_FILES['photo']['tmp_name'], $photoPath);
        }

        require 'db_connection.php';

        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $contact = mysqli_real_escape_string($conn, $_POST['contact']);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hashing the password
        $role = mysqli_real_escape_string($conn, $_POST['role']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);

        // Insert the user into the database 
        $query = "INSERT INTO users (name, email, contact, password, role, address, photo) 
                  VALUES ('$name', '$email', '$contact', '$password', '$role', '$address', '$photoPath')";

        $registrationSuccess = false;
        $registrationMessage = '';

        if (mysqli_query($conn, $query)) {
        $registrationSuccess = true;
        $registrationMessage = "<h2>Registration Successful!</h2><p>You can now <a href='login.php'>login</a>.</p>";
        } else {
        $registrationSuccess = true;
        $registrationMessage = "<h2>Error</h2><p>" . mysqli_error($conn) . "</p>";
        }

    }
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crop Bidding Registration</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: url('https://i.pinimg.com/originals/04/77/76/0477764895b3b7f5a1996a3776716ac2.gif') repeat center center / cover;
        }

        .container {
            position: relative;
            padding: 50px;
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: 20px;
            width: 700px;
            height:900px;
            display: flex;
            flex-direction: column;
            gap: 20px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.1);
            justify-content: space-between;
        }

        .message-container {
            padding: 60px;
            width: 700px;
            text-align: center;
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: 20px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.1);
            font-size: 20px;
            color: #000;
        }

        .message-container h2 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .message-container a {
            color: #6ce967;
            font-weight: bold;
            text-decoration: none;
        }

        .message-container a:hover {
            text-decoration: underline;
        }

        h2 {
            font-size: 48px;
            color: #000000;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        .input-group {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .input-group label {
            font-size: 18px;
            color: #000000;
        }

        .input-group input, .input-group select {
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #ddd;
            font-size: 18px;
            color: #333;
            width: 100%;
        }

        .input-group input:focus, .input-group select:focus {
            outline: none;
            border-color: #6ce967;
            box-shadow: 0 0 5px rgba(108, 233, 103, 0.5);
        }

        button {
            background-color: #6ce967;
            color: rgb(19, 2, 2);
            height: 55px;
            width: 100%;
            border-radius: 40px;
            border: none;
            font-size: 20px;
            cursor: pointer;
            transition: transform 0.3s;
        }

        button:hover {
            transform: scale(1.05);
        }

        .error {
            color: red;
            font-size: 16px;
        }

        .form-page {
            display: none;
             
            
        }

        .form-page.active {
            display: block;
        }

        .login-footer {
            text-align: center;
            font-size: 20px;
            color: #565555;
        }

        .login-footer a {
            text-decoration: none;
            color: #6ce967;
            font-weight: bold;
        }

        .login-footer a:hover {
            text-decoration: underline;
        }

        .pagination-container {
            margin-top: auto;
            text-align: center;
        }

        .pagination {
            display: flex;
            justify-content: center;
            list-style: none;
            gap: 10px;
        }

        .page-item {
            margin: 0;
        }

        .page-link {
            padding: 8px 16px;
            text-decoration: none;
            color: #333;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            cursor: pointer;
        }

        .page-link:hover {
            background-color: #6ce967;
            color: #fff;
        }

        #page3 {
            text-align: center;
            padding: 40px;
            margin: 0 auto;
        }

        #page3 h3 {
            font-size: 32px;
            color: #333;
            margin-bottom: 20px;
            font-weight: bold;
        }

        #page3 p {
            font-size: 18px;
            color: #555;
            margin-bottom: 30px;
        }
        
        @media (max-width: 768px) {
        .container, .message-container {
        transform: scale(0.8);
        transform-origin: top center;
        }
        }

        @media (max-width: 480px) {
        .container, .message-container {
        transform: scale(0.65);
        transform-origin: center;
        }
        }

    </style>
</head>

<body>
<?php if (isset($registrationSuccess) && $registrationSuccess): ?>
    <div class="message-container">
        <?= $registrationMessage ?>
    </div>
<?php else: ?>
<div class="container">
    <h2>Registration</h2>
    
    <form id="registrationForm" method="POST" enctype="multipart/form-data">
        <!-- First Page: Personal Information -->
        <div class="form-page active" id="page1">
            <div class="input-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" value="<?= isset($_POST['name']) ? $_POST['name'] : '' ?>" placeholder="Enter your full name">
                <span class="error"><?= isset($errors['name']) ? $errors['name'] : '' ?></span>
            </div>

            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>" placeholder="Enter your email">
                <span class="error"><?= isset($errors['email']) ? $errors['email'] : '' ?></span>
            </div>

            <div class="input-group">
                <label for="contact">Contact Number</label>
                <input type="tel" id="contact" name="contact" value="<?= isset($_POST['contact']) ? $_POST['contact'] : '' ?>" placeholder="Enter your contact number">
                <span class="error"><?= isset($errors['contact']) ? $errors['contact'] : '' ?></span>
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password (should be atleast 6-characters long)">
                <span class="error"><?= isset($errors['password']) ? $errors['password'] : '' ?></span>
            </div>

            <div class="input-group">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm your password">
                <span class="error"><?= isset($errors['confirmPassword']) ? $errors['confirmPassword'] : '' ?></span>
            </div>

            <div class="input-group">
                <label for="role">Role</label>
                <select id="role" name="role">
                    <option value="">Select your role</option>
                    <option value="farmer" <?= (isset($_POST['role']) && $_POST['role'] == 'farmer') ? 'selected' : '' ?>>Farmer</option>
                    <option value="buyer" <?= (isset($_POST['role']) && $_POST['role'] == 'buyer') ? 'selected' : '' ?>>Buyer</option>
                </select>
                <span class="error"><?= isset($errors['role']) ? $errors['role'] : '' ?></span>
            </div>
        </div>

        <!-- Second Page: Address and Photo Upload -->
        <div class="form-page" id="page2">
            <div class="input-group">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" value="<?= isset($_POST['address']) ? $_POST['address'] : '' ?>" placeholder="Enter your address">
                <span class="error"><?= isset($errors['address']) ? $errors['address'] : '' ?></span>
            </div>

            <div class="input-group">
                <label for="photo">Upload Photo</label>
                <input type="file" id="photo" name="photo" accept="image/*">
                <span class="error"><?= isset($errors['photo']) ? $errors['photo'] : '' ?></span>
            </div>
        </div>

        <!-- Third Page: Confirmation -->
        <div class="form-page" id="page3">
            <h3>Your registration is complete.</h3>
            <p>Please click on Submit.</p>
            <button type="submit" class="button">Submit</button>
        </div>
    </form>

    <!-- Pagination -->
    <div class="pagination-container">
        <nav>
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous" onclick="previousPage()">←</a>
                </li>
                <li class="page-item"><a class="page-link" href="#" onclick="nextPage(1)">1</a></li>
                <li class="page-item"><a class="page-link" href="#" onclick="nextPage(2)">2</a></li>
                <li class="page-item"><a class="page-link" href="#" onclick="nextPage(3)">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next" onclick="nextPage()">→</a>
                </li>
            </ul>
        </nav>
    </div>

    <div class="login-footer">
        <p>Already have an account? <a href="login.php">Log in</a></p>
    </div>
</div>
<?php endif; ?>
<script>
    let currentPage = 1;

function nextPage(pageNumber) {
    if (pageNumber) {
        currentPage = pageNumber;
    } else {
        currentPage++;
    }

    if (currentPage > 3) currentPage = 3;
    if (currentPage < 1) currentPage = 1;

    const pages = document.querySelectorAll('.form-page');
    pages.forEach(page => page.classList.remove('active'));

    document.getElementById('page' + currentPage).classList.add('active');
}

function previousPage() {
    currentPage--;
    if (currentPage < 1) currentPage = 1;

    const pages = document.querySelectorAll('.form-page');
    pages.forEach(page => page.classList.remove('active'));

    document.getElementById('page' + currentPage).classList.add('active');
}

</script>

</body>
</html>
