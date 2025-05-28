<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <link rel="stylesheet" href="pembayaran.css">
</head>
<body>
    <div class="nav">
        <div class="logo">
            <a href="menu.php">
                <img src="./Images/logo.png" alt="logo">
                <p>BEANPOS</p>
            </a>
        </div>
        <div id="mySidepanel" class="sidepanel">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="menu.php">Menu</a>
            <a href="history.php">History</a>
            <a href="cart.php">Cart</a>
        </div>

        <button class="openbtn" onclick="openNav()">&#9776;</button>
    </div>
    <div class="content">
        <div class="box">
            <div class="label">
                <img src="./Images/logo.png" alt="status">
                <p>Transaksi berhasil</p>
                <p>Terimakasih sudah belanja</p>
            </div>
            <div class="detail">
                <div class="informasi">
                    <p>id akun :</p>
                    <p>id pesanan :</p>
                    <p>tanggal :</p>
                    <p>total produk :</p>
                    <p>total harga :</p>
                    <p>bayar :</p>
                    <p>kembali :</p>
                </div>
                <div class="total">
                    <p>kasir</p>
                    <p>12</p>
                    <p>29-09-2008</p>
                    <p>3</p>
                    <p>53.000</p>
                    <p>55.000</p>
                    <p>2000</p>
                </div>
            </div>
            <div class="tombol">
                <input type="button" value="belanja kembali">
            </div>
        </div>
    </div>
</body>
</html>