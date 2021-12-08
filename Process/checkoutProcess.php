<?php
    session_start();
    include('../db.php');
    $id = $_SESSION['userId'];
    $cart = mysqli_query($con, "SELECT * FROM cart WHERE user_id='$id' AND checkout=0");
    
    if(!mysqli_num_rows($cart) == 0){
        $query = mysqli_query($con, "UPDATE cart set checkout=1 WHERE user_id='$id' AND checkout=0");
        $_SESSION['pay']=1;
        echo'
            <script>window.location = "../Page/shoppingCart.php"</script>
        ';
    }else{
        echo'
        <script> alert("Cart Empty!");  window.location = "../Page/shoppingOnline.php"</script>
        ';
    }

?>