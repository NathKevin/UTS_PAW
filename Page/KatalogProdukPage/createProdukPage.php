<?php     
  session_start();     
    if (!$_SESSION['isLogin']) {         
      header("location: ../index.php");     
    }else {         
      include('../../db.php');     
    }     
    
    echo '

        <!doctype html>
        <html lang="en">

        <head>
            <!-- Required meta tags  -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="../../stylesIndex.css">
            <script src="script.js"></script>

            <!-- Bootstrap CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
                integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500&display=swap" rel="stylesheet">
            <title>SUUPAMAKETO|Add Product</title>

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
                    <a href="../adminPage.php"> 
                        <button type="button" class="btn btn-warning" name="Back">Back</button>
                    </a>
                </div>
            </div>
            <br><br><br><br>

            </div>
            <div  class="container p-3 m-6 h-50" style="background-color: #FFFFFF; 
                border-top: 5px solid #ff5e00; boxshadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                <h4>ADD PRODUCT</h4>
                <hr>
                <form action="../../Process/KatalogProdukProcess/createProdukProcess.php" method="post">
                <div class="mb-3">                
                    <label for="exampleInputEmail1" class="form-label">Nama Barang</label>
                    <input class="form-control" id="name" name="name" aria-describedby="emailHelp" required>      
                </div> 
                <div class="mb-3">                
                    <label for="exampleInputEmail1" class="form-label">Harga</label>
                    <input class="form-control" id="price" name="price" aria-describedby="emailHelp" required>            
                </div> 
                <div class="mb-3">                
                    <label for="exampleInputEmail1" class="form-label">Berat</label>
                    <input class="form-control" id="weight" name="weight" aria-describedby="emailHelp" required>          
                </div>
                <div class="mb-3">                
                    <label for="exampleInputEmail1" class="form-label">URL Gambar</label>
                    <input class="form-control" id="url" name="url" aria-describedby="emailHelp" required>          
                </div>  
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary" name="btnAddProduct">ADD</button>
                </div>
                </form>
            </div>

        </body>

        </html>

        '
?>