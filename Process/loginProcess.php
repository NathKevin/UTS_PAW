<?php

    if(isset($_POST['Login'])){
        include('../db.php');

        $username = $_POST['user'];
        $password = $_POST['pass'];
        $userType = $_POST['userType'];

        $query = mysqli_query($con, "SELECT * FROM customer 
                                    WHERE username = '$username'") or die(mysqli_error($con));

        if(mysqli_num_rows($query) == 0){
            echo
                '
                    <script> alert("User not found!"); window.location = "../index.php" </script>
                ';
        }else{
            $user = mysqli_fetch_assoc($query);
            if(password_verify($password, $user['password']) || $password == $user['password']){
                session_start();

                $_SESSION['isLogin'] = true;
                $_SESSION['userId'] = $user['id'];
                $_SESSION['pay'] = 0;

                if($user['userType'] == $userType && $user['userType'] == "admin"){
                    echo
                        '
                            <script> alert("Login Success as Admin!"); window.location ="../Page/adminPage.php" </script>
                        ';
                }elseif($user['userType'] == $userType && $user['userType'] == "customer"){
                    if($user['verify'] == 1){
                        echo
                        '
                            <script> alert("Login Success as User!"); window.location ="../Page/homePage.php" </script>
                        ';
                    }else{
                        echo
                        '
                            <script> alert("Please Verify Email First!"); window.location ="../index.php" </script>
                        ';
                    }
                    
                } 
                else{
                    echo
                        '
                            <script> alert("UserType not Match!"); window.location ="../index.php" </script>
                        ';
                }
            }else{
                echo
                    '
                        <script> alert("Password invalid!"); window.location ="../index.php" </script>
                    ';
            }
        }
    }else{
        echo
            ' <script> window.history.back() </script> ';
    }
?>