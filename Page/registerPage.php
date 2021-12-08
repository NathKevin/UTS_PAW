<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags  -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../styleRegister.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500&display=swap" rel="stylesheet">
    <title>Register Page</title>

</head>

<body>
    <div class="navbar navbar-light fixed-top" style="background-color:#faefcf">
        <div class="align-baseline">
            <span class="navbar-brand fw-bold">SUUPAMAKETO</span>
        </div>
    </div>
    <div class="bg">
        <div class="container">
            <div class="card mx-auto">
                <form method="POST" action="../Process/registerProcess.php">
                    <div class="d-flex justify-content-center">
                        <h1>REGISTER</h1>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="exampleInputEmail1" class="form-label">Username</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="user" required>
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="pass" required>
                        </div>
                        <div class="col-md-4">
                            <label for="exampleInputPassword1" class="form-label">Name</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="name" required>
                        </div>
                        <div class="col-md-4">
                            <label for="exampleInputPassword1" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="phoneNumber"
                                required>
                        </div>
                        <div class="col-md-4">
                            <label for="exampleInputPassword1" class="form-label">Email</label>
                            <input type="email" class="form-control" id="exampleInputPassword1" name="email"
                                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{3,}$" required>
                        </div>
                        <div class="col-md-12">
                            <label for="exampleInputPassword1" class="form-label">Address</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="address" required>
                        </div>
                        <input type="hidden" value="customer" name="userType">
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary" name="Register">Register</button>
                        </div>
                    </div>
                </form>
                <br>
                <div class="d-flex justify-content-center text-center">
                    <p>Already have an account?</p>
                    <a href="/UTS_PAW_Project">Click Here</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>