<?php
    include('../db.php');

    $id= $_GET['id'];
    $query=mysqli_query($con, "UPDATE customer set verify=1 WHERE id=$id") or die(mysqli_error($con));

    if($query){
        echo '
            <script>
                alert("Account has been verified"); window.location = "../index.php";
            </script>
        ';
    }else{
        echo '
        <script>
            alert("Verify Failed"); window.location = "../index.php";
        </script>
        ';
    }
?>