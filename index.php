<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body background="image/blood-cells.jpg">
    <form class="" action="loginProcess.php" method="post">
        <div class="container" style="margin-top:200px;">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h1 class="mt-4 mb-3" style="color:#D2F015 ;">
                        Blood Bank & Management
                        <br>Admin Login Portal
                    </h1>
                </div>
            </div>
            <div class="card" style="height:250px; background-image:url('image/glossy1.jpg');">
                <div class="card-body">
                    <div class="row justify-content-lg-center justify-content-mb-center">
                        <div class="col-lg-6 mb-6 ">
                            <div class="font-italic" style="font-weight:bold">Username<span style="color:red">*</span></div>
                            <div><input type="text" name="username" placeholder="Enter your username" class="form-control" required></div>
                        </div>
                    </div>
                    <div class="row justify-content-lg-center justify-content-mb-center">
                        <div class="col-lg-6 mb-6 "><br>
                            <div class="font-italic" style="font-weight:bold">Password<span style="color:red">*</span></div>
                            <div><input type="password" name="password" placeholder="Enter your Password" class="form-control" required></div>
                        </div>
                    </div>
                    <div class="row justify-content-lg-center justify-content-mb-center">
                        <div class="col-lg-4 mb-4 " style="text-align:center"><br>
                            <div><input type="submit" name="login" class="btn btn-primary" value="LOGIN" style="cursor:pointer"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>