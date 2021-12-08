<?php
    include '../Component/dashboardAdmin.php' 
?>

<div class="container p-2 m-8 h-80"
    style="background-color: #FFFFFF; border-top: 5px solid #ff5e00; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
    <div class="d-flex justify-content-between">
        <h4>PRODUCT CATALOG</h4>
        <a href="./KatalogProdukPage/createProdukPage.php">
            <button type="button" class="btn btn-success" name="btnAdd">Add Product</button>
        </a>
    </div>
    <hr>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Harga</th>
                <th scope="col">Berat/gr</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $limit = 5;
                $page = isset($_GET['page'])?(int)$_GET['page'] : 1;
                $first_page = ($page>1) ? ($page * $limit) - $limit : 0;

                $previous = $page-1;
                $next = $page+1;

                $query = mysqli_query($con, "SELECT * FROM produk") or die(mysqli_error($con));
                $data_count = mysqli_num_rows($query);
                $total_page = ceil($data_count/$limit); 

                $query_product = mysqli_query($con, "SELECT * FROM produk limit $first_page, $limit") or die(mysqli_error($con));
                $number = $first_page+1;

                 if(mysqli_num_rows($query_product) == 0){
                    echo '<tr> <td colspan="5"> Tidak ada data </td> </tr>'; 
                 }else{
                    while($data = mysqli_fetch_assoc($query_product)){ 
                    echo'
                        <tr>
                            <th scope="row">'.$number++.'</th> 
                            <td>'.$data['nama'].'</td> 
                            <td>'.$data['harga'].'</td> 
                            <td>'.$data['berat'].'</td> 
                            <td>
                                <a href="./KatalogProdukPage/updateProdukPage.php?id='.$data['id'].'"><i style="color: green" class="fa fa-edit"></i></a> 
                                <a href="../Process/KatalogProdukProcess/deleteProdukProcess.php?id='.$data['id'].'"  
                                    onClick="return confirm ( \'Confirm Delete Data?\')"> 
                                    <i style="color: red" class="fa fa-trash"></i> 
                                </a>
                            </td>
                        </tr>';
                    }
                 }
                 ?>
        </tbody>
    </table>
    <nav>
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" <?php if($page>1){echo "href='?page=$previous'";} ?>>Previous</a>
            </li>
            <?php 
				for($x=1;$x<=$total_page;$x++){
			    ?>
            <li class="page-item"><a class="page-link" href="?page=<?php echo $x ?>"><?php echo $x; ?></a></li>
            <?php
			    }
			?>
            <li class="page-item">
                <a class="page-link" <?php if($page < $total_page) { echo "href='?page=$next'"; } ?>>Next</a>
            </li>
        </ul>
    </nav>
</div>

</body>

</html>