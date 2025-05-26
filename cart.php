<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <style>
        *,
        html {
            padding: 0;
            margin: 0;
        }

        body{
            min-width: 100vh;
        }
        nav {
            display: flex;
            background-color: #bc884f;
            padding: 10px 20px;
            align-items: center;
            justify-content: space-between;
        }
        .logo {
         display: flex;
         align-items: center;
         gap: 10px;
        }
        .logo img {
            height: 50px;
        }
        .logo h3 {
            color: #402e1e;
        }

        main {
            height: 86vh;
            background-image: linear-gradient(to right, #5e4f48 , #9f856b)
        }
        .keranjang {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            padding: 20px;
            max-width: 1200px;
            margin: auto;
        }
        .keranjang h3 {
            grid-column: 1 / -1;
            text-align: center;
            color: #fff;
            font-size: 32px;
            font-weight: bold;
            font-family: 'Georgia', serif;
            margin-bottom: 10px;
        }

        footer {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            background-color: #bc884f;
            padding: 13.5px 20px;
        }
        .content_footer{
            display: flex;
            flex-direction: column;
            color: white;
            padding-right: 5%;
        }
        .content_footer a {
            color: #9c5a27;
            border: 2px solid white;
            background-color: white;
            border-radius: 5px;
            text-decoration: none;
        }
        .content_footer a:hover{
            border: 2px solid lightgray;
            background-color: lightgray;
            transition: .5s ease-in-out;
        }
    </style>
</head>
<body>
    <nav>
        <div class="logo">
            <img src="Images/Logo_kopi.jpg">
        <h3>BEANPOS</h3>
        </div>
    </nav>
    <main>
        <div class="keranjang">
        <h3>Keranjang Pesanan</h3>
        </div>
    </main>
    <footer>
        <div class="content_footer">
        <p>Total :</p>
        <p><a href="login.php">Selesaikan Pembayaran</a></p>
        </div>
    </footer>
</body>
</html>