<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - BSIS Student Information System</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(270deg, #003366, #ffcc00, #ffffff, #000000);
            background-size: 800% 800%;
            animation: moveBackground 20s ease infinite;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        @keyframes moveBackground {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .login-box {
            background: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.3);
            width: 350px;
            backdrop-filter: blur(10px);
        }

        .login-box h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #003366;
            font-size: 28px;
        }

        .login-box input[type="text"],
        .login-box input[type="password"] {
            width: 100%;
            padding: 14px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
        }

        .login-box button {
            width: 100%;
            padding: 14px;
            background: #003366;
            color: white;
            border: none;
            border-radius: 8px;
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
        }

        .login-box button:hover {
            background: #0059b3;
            transform: scale(1.05);
        }
    </style>
</head>
<body>

<div class="login-box">
    <h2>BSIS Login</h2>
    <form id="loginForm" onsubmit="return loginUser()">
        <input type="text" id="username" placeholder="Username" required>
        <input type="password" id="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</div>

<script>
function loginUser() {
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    if (username === 'admin' && password === 'admin123') {
        alert('Login Successful!');
        window.location.href = "dashboard.php"; // Redirect to dashboard.php
        return false;
    } else {
        alert('Invalid username or password!');
        return false;
    }
}
</script>

</body>
</html>