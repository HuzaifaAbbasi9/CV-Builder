<?php
session_start();
if (isset($_SESSION["id"])) {
    header("Location: index.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="images/png"
          href="https://dollaresumes.com/wp-content/themes/DollarResumes/images/favicon.png">
    <title>Create Your Resume in Minutes!</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900">
</head>
<body>
<div class="container register-form">
    <form class="form signup">
        <div class="form-content text-center">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" required placeholder="Your Name *"
                               value=""/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" required placeholder="Your Email *"
                               value=""/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="number" class="form-control" name="number" required
                               placeholder="Phone Number *" value=""/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group position-relative">
                        <input type="password" class="form-control" name="password" required
                               placeholder="Your Password *" value=""/>
                        <div class="action-btns">
                            <i class="fas fa-eye-slash icons show-pswd show-icon"></i>
                            <i class="fas fa-eye icons hide-pswd"></i>
                        </div>
                    </div>
                    <div class="form-group d-none invisible">
                        <input type="text" class="form-control" name="page" value="signup"/>
                    </div>
                </div>
            </div>
            <button type="submit" class="btnSubmit mt-4">Submit</button>
            <a href="login.php" class="link">Log In</a>
        </div>
    </form>
</div>

<script src=" assets/js/jquery.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/sript.js"></script>
</body>
</html>