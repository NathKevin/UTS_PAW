<?php     
  session_start();     
    if (!$_SESSION['isLogin']) {         
      header("location: ../index.php");     
    }else {         
      include('../db.php');
      $id=$_SESSION['userId'];
      $query=mysqli_query($con, "SELECT nama FROM customer WHERE id='$id'");
      $result=mysqli_fetch_assoc($query);
      $user = $result['nama'];
      $_SESSION['nama']=$user;
        
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500&display=swap" rel="stylesheet">
    <title>SUUPAMAKETO|Home Page</title>

    <style>
    .user {
        margin-right: 30px;
    }

    .btn {
        margin-right: 50px;
    }

    .carousel-item {
        background: no-repeat center center scroll;
        background-color: rgba(0, 0, 0, 0.7);
        background-size: cover;
        height: 100vh;
        min-height: 300px;
    }

    .d-block {
        background-color: black;
        opacity: 0.6;
    }

    .carousel-caption {
        top: 290px;
    }

    .carousel-caption h5 {
        font-size: 30px;
        letter-spacing: 2px;
        margin-top: 25px;
    }

    .navbar .container-fluid .navbar-brand {
        color: #ffffff;
    }

    .navbar .container-fluid .collapse .navbar-nav .nav-item .nav-link .btn {
        color: #ffffff;
        border: none;
    }
    </style>

</head>

<body>
    <div class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color:#faefcf">
        <div class="align-baseline">
            <span class="navbar-brand fw-bold">SUUPAMAKETO</span>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./homePage.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./shoppingOnline.php">Shop Online</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="./profilePage.php">Profile</a>
                </li>
            </ul>
        </div>
        <div class="align-baseline">
            <span class="user">Welcome, <?=$user;?> Happy Shopping !</span>
            <a href="../Process/logoutProcess.php">
                <button type="button" class="btn btn-warning" name="Logout">Logout</button>
            </a>
        </div>
    </div>

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../Assets/Shop1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>A SUPERMARKET YOU CAN TRUST</h5>
                    <p>Our oficial store has spreaded to SOLO, JOGJA, and SEMARANG</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../Assets/shop2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>FRESH AND NEW INGREDIENT </h5>
                    <p>We always provide the best for our customer</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../Assets/shop4.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>BEST SERVICE</h5>
                    <p>Feel free to contact for us to be better</p>
                    <p>CS : 081223334455</p>
                    <p>Email : suupamaketo@gmail.com</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

</body>

</html>