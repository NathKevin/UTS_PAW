<?php
    include '../../Component/dashboardUpdateProduk.php' 
?>

<?php
    if(isset($_GET['id'])){
        include('../../db.php');

        $id = $_GET['id'];
        $search = mysqli_query($con, "SELECT * FROM produk WHERE produk.id = '$id'") or die(mysqli_error($con));

        if($search){
            $data = mysqli_fetch_assoc($search);
        }else{
            echo             
                '<script>             
                alert("Product Not Exist!"); window.location = "../adminPage.php"             
                </script>';
        }
    }else{
        echo '<script> window.history.back() </script> ';
    }
?>

</div>
<div class="container p-3 m-6 h-80"
    style="background-color: #FFFFFF; 
                border-top: 5px solid #ff5e00; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <h4>UPDATE PRODUCT</h4>
    <hr>
    <form action="../../Process/KatalogProdukProcess/updateProdukProcess.php?id=<?php echo $id ?>" method="post">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama Barang</label>
            <input class="form-control" id="name" name="name" aria-describedby="emailHelp"
                value="<?php echo $data['nama'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Harga</label>
            <input class="form-control" id="price" name="price" aria-describedby="emailHelp"
                value="<?php echo $data['harga'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Berat</label>
            <input class="form-control" id="weight" name="weight" aria-describedby="emailHelp"
                value="<?php echo $data['berat'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">URL Gambar</label>
            <input class="form-control" id="url" name="url" aria-describedby="emailHelp"
                value="<?php echo $data['gambar'] ?>" required>
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary" name="btnUpdate">UPDATE</button>
        </div>
    </form>
</div>

</body>

</html>