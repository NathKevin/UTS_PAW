<?php

    if(isset($_POST['btnUpdate'])){
        include('../db.php');

        $id = $_GET['id'];
        $nama = $_POST['name'];
        $noTelp = $_POST['noTelp'];
        $alamat = $_POST['alamat'];
        $email = $_POST['email'];

        $editQuery = mysqli_query($con, "UPDATE customer SET nama='$nama', noTelp='$noTelp', alamat='$alamat', email='$email'
                                    WHERE id='$id'") or die(mysqli_error($con));

        if($editQuery){
            echo
                '<script>
                alert("Update Profile Success"); window.location = "../Page/profilePage.php"
                </script>';
        }else{
            echo
                '<script>                 
                alert("Edit Profile Failed");                  
                </script>';
        }
    }

?>