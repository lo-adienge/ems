<?php
session_start();

// Include the config file
require_once('assets/constants/config.php');

// Check if the connection exists
if (!isset($conn)) {
    die('Database connection not established. Please check your config.php file.');
}

// Include additional information file
require_once('assets/constants/fetch-my-info.php');

try {
    // Query to fetch data from the database
    $sql = "SELECT * FROM manage_website WHERE status = '0'";
    $statement = $conn->prepare($sql);
    $statement->execute();

    $row = $statement->fetch(PDO::FETCH_ASSOC);

    // Check if data was fetched
    if (!$row) {
        die('No active website configuration found in the database.');
    }

    // Extract the row data into variables
    extract($row);
} catch (PDOException $e) {
    die('Query failed: ' . $e->getMessage());
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?></title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="admin/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="admin/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="admin/assets/libs/css/style.css">
    <link rel="stylesheet" href="admin/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">

    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
        }
    </style>
</head>

<body style="background-image: url('assets/uploadImage/Logo/<?php echo htmlspecialchars($background_login_image, ENT_QUOTES, 'UTF-8'); ?>'); background-repeat: no-repeat; background-size: cover;">
    <!-- ============================================================== -->
    <!-- login page -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card">
            <div class="card-header text-center">
                <a href="../index.php">
                    <img class="img-fluid" src="assets/uploadImage/Logo/<?php echo htmlspecialchars($logo, ENT_QUOTES, 'UTF-8'); ?>" style="width:300px;height:auto;" alt="Theme-Logo" />
                </a>
            </div>
            <div class="card-body">
                <?php require_once('assets/constants/check-reply.php'); ?>

                <form action="assets/app/auth.php" method="POST" autocomplete="off">
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="inputField1" type="text" placeholder="Email" name="email">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="inputField2" type="password" placeholder="Password" name="password">
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Remember Me</span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                </form>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end login page -->
    <!-- ============================================================== -->

    <!-- Optional JavaScript -->
    <script src="admin/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="admin/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="admin/assets/js/space.js"></script>
</body>

</html>
