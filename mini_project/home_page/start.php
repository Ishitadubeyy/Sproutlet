<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
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
        }

        .getstarted {
            color: black;
        }

        .left-section {
            width: 60%;
            display: flex;
            justify-content: center;
            align-items: center; 
            background: url('https://i.pinimg.com/originals/04/77/76/0477764895b3b7f5a1996a3776716ac2.gif') repeat center center / cover; 
            color: black;
            text-align: left;
            padding: 20px;
        }

        .left-section h1 {
            font-size: 40px;
            font-weight: bold;
            margin-bottom: 20px;
            padding-bottom: 10px;
            display: inline-block;
            white-space: nowrap;
            animation: typing 5s steps(50) 1s 1 normal both, blinkCaret 1s step-end infinite;
        }

        .typing-effect {
            display: inline-block;
            overflow: hidden; 
            width: 10; 
            white-space: nowrap;
            border-right: 2px solid black; 
            text-align: left;
        }

        @keyframes typing {
            from {
                width: 0;
            }
            to {
                width: 100%;
            }
        }

        @keyframes blinkCaret {
            50% {
                border-color: transparent;
            }
        }

        .right-section {
            width: 40%;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #ffffff;
            text-align: center;
            flex-direction: column;
            padding: 30px;
        }

        .right-section h2 {
            font-size: 28px;
            margin-bottom: 30px;
            color: #333333;
        }

        .button-group {
            display: flex;
            gap: 30px;
            justify-content: center;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

        .button {
            background-color: #6ce967;
            color: rgb(19, 2, 2);
            height: 50px;
            width: 200px;
            border-radius: 40px;
            border: none;
            font-family: 'Arial', sans-serif;
            font-size: 18px;
            text-align: center;
            cursor: pointer;
            transition: transform 0.2s ease-in-out;
        }

        .button:hover {
            transform: scale(1.05);
        }

        footer {
            margin-top: 40px;
            color: #666666;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="left-section">
        <h1 class="typing-effect">Harvesting Opportunities, One Bid at a Time.</h1>
    </div>
    <div class="right-section">
        <h2 class="getstarted">Get started</h2>
        <div class="button-group">
            <button class="button login" onclick="window.location.href='login.php'">Log in</button>
            <button class="button signup" onclick="window.location.href='register.php'">Sign up</button>
        </div>
    </div>
</body>
</html>
