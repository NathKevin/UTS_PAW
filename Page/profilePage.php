<?php     
  session_start();     
    if (!$_SESSION['isLogin']) {         
      header("location: ../index.php");     
    }else {         
      include('../db.php');
      $id=$_SESSION['userId'];
      $query=mysqli_query($con, "SELECT * FROM customer WHERE id='$id'");
      $data=mysqli_fetch_assoc($query);
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500&display=swap" rel="stylesheet">
    <title>SUUPAMAKETO|Profile Page</title>

    <style>
    .user {
        margin-right: 30px;
    }

    .btn {
        margin-right: 50px;
    }

    body {
        background: url("../assets/supamaketo.png");
        background-position: center;
        background-repeat: repeat;
        background-size: cover;
        height: 100%;
    }

    .card-content {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        border-radius: 10px;
        height: fit-content;
        padding: 20px;
        background: white;
        margin-top: 70px;
        width: 1400px !important;
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
                    <a class="nav-link" aria-current="page" href="./homePage.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./shoppingOnline.php">Shop Online</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./profilePage.php">Profile</a>
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
    <br><br><br>
    <div class="container" style="margin-top:20px; margin-bottom:20px; color:white">
        <h2>Profile</h2>
    </div>
    <hr>
    <div class="container card-content">
        <form action="../Process/updateProfileProcess.php?id=<?php echo $id ?>" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nama</label>
                <input class="form-control" id="name" name="name" aria-describedby="emailHelp"
                    value="<?php echo $data['nama'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Phone Number</label>
                <input class="form-control" id="noTelp" name="noTelp" aria-describedby="emailHelp"
                    value="<?php echo $data['noTelp'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Address</label>
                <input class="form-control" id="alamat" name="alamat" aria-describedby="emailHelp"
                    value="<?php echo $data['alamat'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input class="form-control" id="email" name="email" aria-describedby="emailHelp"
                    value="<?php echo $data['email'] ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{3,}$" required>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary" name="btnUpdate">UPDATE</button>
            </div>
        </form>
    </div>

</body>

</html>