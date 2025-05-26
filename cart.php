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

        nav {
            display: flex;
            background-color: #bc884f;
            width: 100%;
            height: 10vh;
            align-items: center;
        }
        .brand {
            color: #402e1e;
        }

        main {
            height: 80vh;
            background-image: linear-gradient(to right, #5e4f48 , #9f856b)
        }
        h1 {
            color: white;
        }

        footer {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            background-color: #bc884f;
            width: 100%;
            height: 10vh;
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
        <h5 class="brand">BEANPOS</h5>
    </nav>
    <main>
        <h1 align="center">Keranjang Pesanan</h1>
    </main>
    <footer>
        <div class="content_footer">
        <p>Total :</p>
        <p><a href="login.php">Selesaikan Pembayaran</a></p>
        </div>
    </footer>
</body>
</html>