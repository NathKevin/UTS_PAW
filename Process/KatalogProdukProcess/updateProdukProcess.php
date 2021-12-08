<?php

    if(isset($_POST['btnUpdate'])){
        include('../../db.php');

        $id = $_GET['id'];
        $nama = $_POST['name'];
        $price = $_POST['price'];
        $weight = $_POST['weight'];
        $url = $_POST['url'];

        $editQuery = mysqli_query($con, "UPDATE produk SET nama='$nama', harga='$price', berat='$weight', gambar='$url'
                                    WHERE id='$id'") or die(mysqli_error($con));

        if($editQuery){
            echo
                '<script>
                alert("Update Product Success"); window.location = "../../Page/adminPage.php"
                </script>';
        }else{
            echo
                '<script>                 
                alert("Edit Data Failed");                  
                </script>';
        }
    }

?>