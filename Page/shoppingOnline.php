<?php
session_start();
if (!$_SESSION['isLogin']) {
    header("location: ../index.php");
} else {
    include('../db.php');
    $produk = mysqli_query($con, "SELECT * FROM produk");
    $user = $_SESSION['nama'];
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags  -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../stylesIndex.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500&display=swap" rel="stylesheet">
    <link href="../styleShoppingOnline.css" rel="stylesheet">
    <title>SUUPAMAKETO|Shopping Page</title>

    <style>
    .user {
        margin-right: 30px;
    }

    .btnNav {
        margin-right: 30px;
    }

    body {
        background: url("../assets/supamaketo.png");
        background-position: center;
        background-repeat: repeat;
        background-size: cover;
        height: 100%;
    }
    </style>

</head>

<body>
    <div class="navbar navbar-expand-lg navbar-light " style="background-color:#faefcf">
        <div class="align-baseline">
            <span class="navbar-brand fw-bold">SUUPAMAKETO</span>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link" href="./homePage.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./shoppingOnline.php">Shop Online</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="./profilePage.php">Profile</a>
                </li>
            </ul>
        </div>
        <div class="align-baseline">
            <span class="user">Welcome, <?=$user;?> Happy Shopping !</span>
            <a id="btnCart" type="button" href="./shoppingCart.php" class="btn btn-warning" name="Cart">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            </a>
            <a type="button" href="../Process/logoutProcess.php" class="btn btn-warning btnNav" name="Logout">Logout</a>

        </div>
    </div>

    <div class="container" style="margin-top:20px; margin-bottom:20px; color:white">
        <h2>Shop Online</h2>
        <h5>We will get your things ready!</h5>
    </div>

    <hr>

    <div class="wrapper">
        <?php
        foreach ($produk as $row) {
        ?>
        <div class="card">
            <img src="<?=$row['gambar'] ?>">
            <div class="info">
                <h1><?=$row['nama'] ?></h1>
                <p>Rp. <?=$row['harga'] ?></p>
                <p>Berat:<?=$row['berat'] ?> gram</p>
                <a class="btn-baru right" href="./confirmationPage.php?produkId=<?php echo $row['id']; ?>">Pesan</a>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</body>

</html>