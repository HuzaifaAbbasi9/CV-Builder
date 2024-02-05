<?php
session_start();
$id = $_SESSION["id"];
if (!isset($id)) {
    header("Location: sign_up.php");
    die();
}

$degrees = ["Select", "High School Diploma", "Matric", "F.A", "F.S.C", "GED", "Associate of Arts", "Associate of Science", "Associate of Applied Science", "Bachelor of Arts", "Bachelor of Science", "BBA", "Master of Arts", "Master of Science", "MBA", "J.D.", "M.D.", "Ph.D.", "Enter a different degree"];

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
    <link rel="stylesheet" href="assets/css/index.css"/>
    <link rel="stylesheet" href="assets/css/auto-complete.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
          rel="stylesheet">
    <script src=" assets/js/jquery.min.js"></script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
</head>
<body class="preloader-outer">
<!-- Preloader -->
<div class="loading">
    <div class="dot"></div>
    <div class="dot"></div>
    <div class="dot"></div>
</div>

<div class="body-content">
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#"><img class="logo" src="images/logo.png" alt="logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link cv_preview" href="">Cv Preview</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link logout" href="#">Log Out</a>
                </li>
            </ul>
        </div>
    </nav>
    <section class="main-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">