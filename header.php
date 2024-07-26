<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <style>
        .navbar {
            background-color: gainsboro !important;
            padding: 10px 20px;
            border: none !important;
            border-radius: 0 !important;
        }

        .navbar-brand {
            font-size: 25px;
            font-weight: bold;
            color: black !important;
            display: flex;
            align-items: center;
        }

        .navbar-brand img {
            max-height: 50px;
            margin-right: 10px;
        }

        .navbar-nav>li>a {
            font-size: 18px;
            color: black !important;
        }

        .navbar-nav>li>a:hover,
        .dropdown-menu>li>a:hover {
            background-color: #E5E8E8;
            color: #333333 !important;
        }

        .dropdown-menu {
            background-color: white !important;
        }

        .dropdown-menu>li>a {
            color: black !important;
        }

        .dropdown-menu>li>a:hover {
            background-color: #E5E8E8;
            color: #333333 !important;
        }

        .navbar-right {
            display: flex;
            align-items: center;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="dashboard.php">
                    <img src="image/logo.png" alt="Logo">
                    Droplet
                </a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="background-color:transparent">
                        <span class="glyphicon glyphicon-user" style="color: black"></span>&nbsp;
                        <?php
                        require_once 'DbConnector.php';
                        // session_start();
                        if (isset($_SESSION['username'])) {
                            $username = $_SESSION['username'];

                            $db = new DbConnector();
                            $conn = $db->getConnection();

                            $sql = "SELECT admin_name FROM admin_info WHERE admin_username = :username";
                            $stmt = $conn->prepare($sql);
                            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
                            $stmt->execute();
                            $row = $stmt->fetch(PDO::FETCH_ASSOC);

                            if ($row) {
                                echo "<b style='color: black;'>" . htmlspecialchars($row['admin_name']) . "</b>";
                            } else {
                                echo "<b style='color: black;'>Guest</b>";
                            }
                        } else {
                            echo "<b style='color: black;'>Guest</b>";
                        }
                        ?>
                        <span class="caret" style="color: black"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="change_password.php">Change Password</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</body>

</html>