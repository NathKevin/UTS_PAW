<?php     
  session_start();     
    if (!$_SESSION['isLogin']) {         
      header("location: ../index.php");     
    }else {         
      include('../db.php');     
    }     
    
    echo '

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
            <title>SUUPAMAKETO|Admin Page</title>

            <style>
            .user {
                margin-right: 30px;
            }

            .btn {
                margin-right: 50px;
            }
            </style>

        </head>

        <body>
            <div class="navbar navbar-light fixed-top" style="background-color:#faefcf">
                <div class="align-baseline">
                    <span class="navbar-brand fw-bold">SUUPAMAKETO</span>
                </div>
                <div class="align-baseline">
                    <span class="user">You are login as Admin</span>
                    <a href="../Process/logoutProcess.php"> 
                        <button type="button" class="btn btn-warning" name="Logout">Logout</button>
                    </a>
                </div>
            </div>
            <br><br><br><br>
            
        '
?>