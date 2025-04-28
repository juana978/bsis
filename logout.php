<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Logged Out - BSIS Student Information System</title>
    <style>
        /* Animate Background */
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background: linear-gradient(-45deg, #003366, #0059b3, #ffcc00, #ffffff);
            background-size: 400% 400%;
            animation: gradientBG 10s ease infinite;
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            color: #003366;
            text-align: center;
        }

        @keyframes gradientBG {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        h1 {
            font-size: 48px;
            margin-bottom: 20px;
        }

        p {
            font-size: 20px;
            margin-bottom: 30px;
        }

        .btn {
            background-color: #0059b3;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 30px;
            font-size: 18px;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.3s, transform 0.2s;
        }

        .btn:hover {
            background-color: #007bff;
            transform: scale(1.05);
        }
    </style>
</head>
<body>

    <h1>Logged Out</h1>
    <p>You have successfully logged out of the system.</p>
    <a href="login.php" class="btn">Back to Login</a>

</body>
</html>