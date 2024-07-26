<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <style>
        body {
            margin: 0;
            font-family: 'poppins', sans-serif;
            font-size: 15px;
            color: #343a40;
        }

        .sidebar {
            margin: 0;
            padding: 0;
            width: 200px;
            background-color: #f8f9fa;
            position: fixed;
            height: 100%;
            overflow: auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .sidebar a {
            display: block;
            color: #495057;
            padding: 16px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #007bff;
            color: white;
        }

        .sidebar a.active {
            background-color: #007bff;
            color: white;
        }

        div.content {
            margin-left: 200px;
            padding: 1px 16px;
            height: 1000px;
        }

        @media screen and (max-width: 700px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .sidebar a {
                float: left;
            }

            div.content {
                margin-left: 0;
            }
        }

        a.act {
            background: #555 !important;
            color: white;
        }


        @media screen and (max-width: 400px) {
            .sidebar a {
                text-align: center;
                float: none;
            }
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <a href="dashboard.php" class="<?php if ($active == 'dashboard') echo 'active'; ?>"><span class="glyphicon glyphicon-dashboard"></span>&nbsp&nbspDashboard</a>
        <a href="add_donor.php" class="<?php if ($active == 'add') echo 'active'; ?>"><span class="glyphicon glyphicon-pencil"></span>&nbsp&nbspAdd Donor</a>
        <a href="donor_list.php" class="<?php if ($active == 'list') echo 'active'; ?>"><span class="glyphicon glyphicon-list-alt"></span>&nbsp&nbsp Donor List</a>
        <a href="request.php" class="<?php if ($active == 'request') echo 'active'; ?>"><span class="glyphicon glyphicon-inbox"></span>&nbsp&nbsp Requests</a>
        <a href="new_request.php" class="<?php if ($active == 'new_request') echo 'active'; ?>"><span class="glyphicon glyphicon-pencil"></span>&nbsp&nbsp New Request</a>
    </div>

</body>

</html>