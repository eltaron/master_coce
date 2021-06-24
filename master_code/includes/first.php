<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/indexs.css">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <title>master code</title>
</head>
<body>
    <div class="head">
        <div class="container">
            <a href="index.php"><img src="images/logo3.png" alt=""></a>
            <ul class="mainul">
                <li><a href="index.php" class="<?php if($name == 'home') {echo 'active';} ?>">Home</a></li>
                <li><a href="about.php" class="<?php if($name =='about') {echo 'active';} ?>">About Us</a></li>
                <li><a href="services.php" class="<?php if($name == 'services') {echo 'active';} ?>">Services</a></li>
                <li><a href="contact.php" class="<?php if($name == 'contact') {echo 'active';} ?>">Contact Us</a></li>
            </ul>
            <div class="dropdown">
                <i class="fa fa-bars hidden dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></i>
                <ul class="dropdown-menu text-center">
                    <li><a href="index.php" class="active">Home</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </div>
    <header>
        <div class="main">
            <h1>master code</h1>
            <p>Let's start a long journey and build a new future for us.</p>
            <a href="about.php" class="button">Learn More</a>
            <i class="fa fa-angle-double-down"></i>
        </div>
    </header>