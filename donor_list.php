<?php require_once 'session.php'; ?>
<!DOCTYPE html>
<html>

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

        #he {
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            padding: 3px 7px;
            color: #fff;
            text-decoration: none;
            border-radius: 3px;
            align: center
        }
    </style>
</head>
<?php
require_once 'DbConnector.php';
require_once 'session.php';
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>

    <body style="color:black">
        <div id="header">
            <?php include 'header.php'; ?>
        </div>
        <div id="sidebar">
            <?php $active = "list";
            include 'sidebar.php'; ?>
        </div>
        <div id="content">
            <div class="content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 lg-12 sm-12">
                            <h1 class="page-title">Donor List</h1>
                        </div>
                    </div>
                    <hr>
                    <?php
                    $db = new DbConnector();
                    $conn = $db->getConnection();

                    $limit = 10;
                    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                    $offset = ($page - 1) * $limit;
                    $count = $offset + 1;

                    $sql = "SELECT donor_details.*, blood.blood_group 
                FROM donor_details 
                JOIN blood ON donor_details.donor_blood = blood.blood_id 
                LIMIT :offset, :limit";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
                    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
                    $stmt->execute();
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    if ($result) {
                    ?>
                        <div class="table-responsive">
                            <table class="table table-bordered" style="text-align:center">
                                <thead style="text-align:center">
                                    <th style="text-align:center">S.no</th>
                                    <th style="text-align:center">Name</th>
                                    <th style="text-align:center">Mobile Number</th>
                                    <th style="text-align:center">Email Id</th>
                                    <th style="text-align:center">Age</th>
                                    <th style="text-align:center">Gender</th>
                                    <th style="text-align:center">Blood Group</th>
                                    <th style="text-align:center">Address</th>
                                    <th style="text-align:center">Action</th>
                                </thead>
                                <tbody>
                                    <?php foreach ($result as $row) { ?>
                                        <tr>
                                            <td><?php echo $count++; ?></td>
                                            <td><?php echo htmlspecialchars($row['donor_name']); ?></td>
                                            <td><?php echo htmlspecialchars($row['donor_number']); ?></td>
                                            <td><?php echo htmlspecialchars($row['donor_mail']); ?></td>
                                            <td><?php echo htmlspecialchars($row['donor_age']); ?></td>
                                            <td><?php echo htmlspecialchars($row['donor_gender']); ?></td>
                                            <td><?php echo htmlspecialchars($row['blood_group']); ?></td>
                                            <td><?php echo htmlspecialchars($row['donor_address']); ?></td>
                                            <td id="he" style="width:100px">
                                                <a style="background-color:aqua" href='delete.php?id=<?php echo htmlspecialchars($row['donor_id']); ?>'> Delete </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    <?php } ?>

                    <div class="table-responsive" style="text-align:center;align:center">
                        <?php
                        $sql1 = "SELECT COUNT(*) AS total_records FROM donor_details";
                        $stmt1 = $conn->prepare($sql1);
                        $stmt1->execute();
                        $result1 = $stmt1->fetch(PDO::FETCH_ASSOC);

                        if ($result1['total_records'] > 0) {
                            $total_records = $result1['total_records'];
                            $total_page = ceil($total_records / $limit);

                            echo '<ul class="pagination admin-pagination">';
                            if ($page > 1) {
                                echo '<li><a href="donor_list.php?page=' . ($page - 1) . '">Prev</a></li>';
                            }
                            for ($i = 1; $i <= $total_page; $i++) {
                                $active = ($i == $page) ? "active" : "";
                                echo '<li class="' . $active . '"><a href="donor_list.php?page=' . $i . '">' . $i . '</a></li>';
                            }
                            if ($total_page > $page) {
                                echo '<li><a href="donor_list.php?page=' . ($page + 1) . '">Next</a></li>';
                            }
                            echo '</ul>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    <?php
} else {
    echo '<div class="alert alert-danger"><b> Please Login First To Access Admin Portal.</b></div>';
    ?>
        <form method="post" name="" action="login.php" class="form-horizontal">
            <div class="form-group">
                <div class="col-sm-8 col-sm-offset-4" style="float:left">
                    <button class="btn btn-primary" name="submit" type="submit">Go to Login Page</button>
                </div>
            </div>
        </form>
    <?php }
    ?>
    </body>

</html>