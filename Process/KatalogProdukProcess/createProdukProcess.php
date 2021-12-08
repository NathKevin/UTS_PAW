<?php

    if(isset($_POST['btnAddProduct'])){

        include('../../db.php');

        if(!empty($_POST['name'])){
            $namaBarang = $_POST['name'];
        }
        
        if(!empty($_POST['price'])){
            $harga = $_POST['price'];
            $harga = filter_var($harga, FILTER_VALIDATE_INT);
            if ($harga === false) {
                echo
                    '<script>
                    alert("Must be Number and Can not be Decimal"); window.location = "../../Page/KatalogProdukPage/createProdukPage.php"
                    </script>';
                exit('Invalid Integer');
            }
        }

        if(!empty($_POST['weight'])){
            $berat = $_POST['weight'];
            $berat = filter_var($berat, FILTER_VALIDATE_INT);
            if ($berat === false) {
                echo
                    '<script>
                    alert("Must Be Number and Can not be Decimal"); window.location = "../../Page/KatalogProdukPage/createProdukPage.php"
                    </script>';
                exit('Invalid Integer');
            }
        }

        if(empty($_POST['name']) || empty($_POST['price']) || empty($_POST['weight']) || empty($_POST['url'])){
            echo
                '<script>
                alert("Field must be Filled"); window.location = "../../Page/KatalogProdukPage/createProdukPage.php"
                </script>';
            exit();
        }

        $url = $_POST['url'];

        $query = mysqli_query($con, "INSERT INTO produk(nama,harga,berat,gambar)
                                VALUES ('$namaBarang', '$harga', '$berat', '$url')")
                                or die(mysqli_error($con));
        
        if($query){
            echo
                '<script>
                alert("Product Added"); window.location = "../../Page/adminPage.php"
                </script>';
        }else{
            echo
                '<script>                 
                alert("Product Failed Added");                  
                </script>';
        }
    }else{
        echo             
            '<script>             
            window.history.back()             
            </script>'; 
    }

?>