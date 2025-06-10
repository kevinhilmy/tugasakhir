<?php
session_start();
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            margin: 10%;
            height: 100vh;
            font-family: 'Georgia', serif;
            background-image:url(./Images/BackgroundBean.jpeg) ;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: white;
            padding-right: 40%;
        }

        h1 {color: rgb(253, 251, 251);
            display: flex;
            justify-content: center;
            font-size: 35px;
            font-weight: bold;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        form label {
            font-size: 16px;
            color: white;
        }

        form input[type="text"],
        form input[type="password"] {
            width: 350px;
            padding: 12px;
            border: none;
            border-radius: 25px;
            font-size: 16px;
            outline: none;
        }

        form input[type="submit"] {
            width: 100px;
            background-color: white;
            color: black;
            font-weight: bold;
            font-size: 16px;
            padding: 12px;
            border: none;
            border-radius: 25px;
        }

        input[type="submit"]:hover {
        background-color: rgb(103, 71, 54);
        color: white;
        }
        
        p {
            color: white;
            font-size: 13px;
        }

        a {
            color: white;
            text-decoration: underline;
        }

        .login-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
    </style>
</head>

<body>
    <h1>LOGIN</h1>
    <div class="login-container">
        <form action="cek_login.php" method="POST">
            <label>Username:</label><br>
            <input type="text" name="username" required><br>

            <label>Password:</label><br>
            <input type="password" name="password" required><br>

            <input type="submit" value="Login">
            <p class = "signUp">Belum punya akun? <a href="registrasi.php">Sign Up</a></p>
        </form>
    </div>
</body>
</html>