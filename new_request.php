<?php require_once 'session.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
        #sidebar {
            position: relative;
            margin-top: -20px;
        }

        #content {
            position: relative;
            margin-left: 210px;
        }

        @media screen and (max-width: 600px) {
            #content {
                position: relative;
                margin-left: auto;
                margin-right: auto;
            }
        }

        .required::after {
            content: "*";
            color: red;
            margin-left: 3px;
        }

        .form-label {
            color: black;
            font-size: 18px;
            font-weight: normal;
            margin-bottom: 10px;
        }

        .form-header {
            color: black;
            margin-bottom: 40px;
        }

        .form-select {
            font-size: 16px;
        }

        .form-select option {
            font-size: 16px;
        }

        .form-control {
            padding: 10px;
        }
    </style>
</head>

<body style="color:black;">

    <?php
    require_once 'DbConnector.php';

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    ?>

        <div id="header">
            <?php require_once 'header.php'; ?>
        </div>
        <div id="sidebar">
            <?php
            $active = "new_request";
            require_once 'sidebar.php';
            ?>
        </div>
        <div id="content">
            <div class="content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 lg-12 sm-12">
                            <h1 class="page-title">Request Blood</h1>
                        </div>
                    </div>
                    <hr>
                    <form name="request" action="process_request.php" method="post">
                        <div class="row">
                            <div class="col-lg-4 mb-4"><br>
                                <div class="font-italic">First Name<span class="required"></span></div>
                                <div><input type="text" name="firstName" class="form-control" required></div>
                            </div>
                            <div class="col-lg-4 mb-4"><br>
                                <div class="font-italic">Last Name<span class="required"></span></div>
                                <div><input type="text" name="lastName" class="form-control" required></div>
                            </div>
                            <div class="col-lg-4 mb-4"><br>
                                <div class="font-italic">Contact Number<span class="required"></span></div>
                                <div><input type="tel" name="contactNumber" class="form-control" required></div>
                            </div>
                            <div class="col-lg-4 mb-4"><br>
                                <div class="font-italic">Email<span class="required"></span></div>
                                <div><input type="email" name="email" class="form-control" required></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 mb-4"><br>
                                <div class="font-italic">Blood Type<span class="required"></span></div>
                                <div><select name="bloodType" class="form-control" required>
                                        <option value="" selected disabled>Select Blood Type</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-4"><br>
                                <div class="font-italic">Units Needed<span class="required"></span></div>
                                <div><input type="number" name="unitsNeeded" class="form-control" min="1" required></div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-4 mb-4">
                                <div><input type="submit" name="submit" class="btn btn-primary" value="Submit" style="cursor:pointer"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php
    } else {
        echo '<div class="alert alert-danger"><b> Please Login First To Access Admin Portal.</b></div>';
    ?>
        <form method="post" action="login.php" class="form-horizontal">
            <div class="form-group">
                <div class="col-sm-8 col-sm-offset-4" style="float:left">
                    <button class="btn btn-primary" name="submit" type="submit">Go to Login Page</button>
                </div>
            </div>
        </form>
    <?php
    }
    ?>

</body>

</html>