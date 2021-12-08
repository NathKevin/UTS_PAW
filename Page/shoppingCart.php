<?php
session_start();
if (!$_SESSION['isLogin']) {
    header("location: ../index.php");
} else {
    include('../db.php');
    $id = $_SESSION['userId'];
    $cart = mysqli_query($con, "SELECT * FROM cart WHERE user_id='$id'");
    $hargaTotal=0;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="../styleShoppingCart.css">
    <title>Basket</title>
</head>

<body>
    <main>
        <?php
        if($_SESSION['pay']==1){
        ?>
        <div class="alert alert-success" role="alert">
            Thankyou for your Order, Checkout Success!
        </div>
        <?php
        $_SESSION['pay']=0;
        }
        ?>
        <div class="d-flex justify-content-end" style="margin-bottom:20px;">
            <a href="./shoppingOnline.php">
                <button type="button" class="btn btn-warning" name="Back">Back</button>
            </a>
        </div>

        <div class="basket">
            <div class="judul">
                Your Shopping Cart
            </div>
            <div class="basket-labels">
                <ul>
                    <li class="item item-heading">Produk</li>
                    <li class="price">Harga</li>
                    <li class="quantity">Jumlah</li>
                    <li class="subtotal">Subtotal</li>
                </ul>
            </div>
            <div class="basket-product">
                <?php
    foreach($cart as $row){
        $produkId=$row['produk_id'];
        $produk = mysqli_query($con, "SELECT * FROM produk WHERE id='$produkId'");
        $prod = mysqli_fetch_assoc($produk);
        $idCart=$row['id'];
        if($row['checkout'] == 0){
            $hargaTotal=$hargaTotal+$row['harga_total'];
        ?>
                <br>
                <div class="item">
                    <div class="product-image">
                        <img src="<?= $prod['gambar']?>" alt="Placholder Image 2" class="product-frame">
                    </div>
                    <div class="product-details">
                        <h1><strong><span class="item-quantity"><?= $row['qty']?>x</span> </strong> <?= $prod['nama']?>
                        </h1>
                        <p><strong>Berat <?= $prod['berat']?> gr</strong></p>
                    </div>
                </div>
                <div class="price"><?= $prod['harga']?></div>
                <div class="quantity">
                    <input disabled type="number" value="<?= $row['qty']?>" min="1" class="quantity-field">
                </div>
                <div class="subtotal"><?= $row['harga_total']?></div>
                <div class="remove">
                    <button name="btnRemove">
                        <a href="../Process/deleteItemCart.php?id=<?php echo $idCart?>"
                            onClick="return confirm ( \'Confirm Delete Data?\')">Remove</a></button>
                </div>
                <br>
                <?php
             }else{
            ?>
                <?php
                $hargaTotal=0;
             }
        }
        ?>
            </div>
        </div>
        <aside>
            <div class="summary">
                <div class="summary-subtotal">
                    <div class="subtotal-title">Harga Total</div>
                    <div class="subtotal-value final-value" id="basket-subtotal"> <?=$hargaTotal?></div>

                </div>
                <div class="summary-checkout">
                    <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#checkout">
                        CHECKOUT
                    </button>

                </div>
            </div>
        </aside>
    </main>

    <!-- Modal -->
    <div class="modal fade" id="checkout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">PAYMENT</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">E-Wallet Type</label>
                        <select class="form-select" aria-label="Default select example" name="method" id="method">
                            <option value="GO-PAY">GO-PAY</option>
                            <option value="DANA">DANA</option>
                            <option value="OVO">OVO</option>
                            <option value="Shoope-Pay">Shoope-Pay</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Branch</label>
                        <select class="form-select" aria-label="Default select example" name="branch" id="branch">
                            <option value="Yogyakarta">Yogyakarta</option>
                            <option value="Semarang">Semarang</option>
                            <option value="Solo">Solo</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Address Destination</label>
                        <input class="form-control" id="address" name="address" aria-describedby="emailHelp">
                    </div>
                    <br>
                    <br>
                    <br>
                    <hr>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label fw-bold">Total</label>
                        <h5 class="fw-bold"><?= $hargaTotal?></h5>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CANCEL</button>
                    <a href="../Process/checkoutProcess.php">
                        <button type="button" class="btn btn-primary">CONFIRM PAYMENT</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>