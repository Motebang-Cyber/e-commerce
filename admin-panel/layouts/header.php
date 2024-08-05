<?php
	$app

	$app = new App;
	$app->startingSession();

	define("ADMINURL", "http://localhost/clothes/clothes/admin-panel");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Admin Panel</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="" name="keywords">
	<meta content="" name="description">

	<!--Favicon-->
	<link href="<?php echo APPURL; ?>/img/favicon.ico" rel="icon">

	<!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <!--link href="<?php echo APPURL; ?>/lib/animate/animate.min.css" rel="stylesheet"-->
    <!--link href="<?php echo APPURL; ?>/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet"-->

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo APPURL; ?>/styles/style.css" rel="stylesheet">

</head>
<body>
<div id="wrapper">
    <nav class="navbar header-top fixed-top navbar-expand-lg  navbar-dark bg-dark">
      <div class="container">
      <a class="navbar-brand" href="#">LOGO</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarText">
        <?php if(isset($_SESSION['email'])) : ?>
        <ul class="navbar-nav side-nav" >
          <li class="nav-item">
            <a class="nav-link" style="margin-left: 20px;" href="<?php echo ADMINURL; ?>">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo ADMINURL; ?>/admins/admins.php" style="margin-left: 20px;">Admins</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo ADMINURL; ?>/orders-admins/show-orders.php" style="margin-left: 20px;">Orders</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo ADMINURL; ?>/foods-admins/show-foods.php" style="margin-left: 20px;">Foods</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo ADMINURL; ?>/bookings-admins/show-bookings.php" style="margin-left: 20px;">Bookings</a>
          </li>
        </ul>
        <?php endif; ?>
        <ul class="navbar-nav ml-md-auto d-md-flex">
          <?php if(!isset($_SESSION['email'])) : ?>
          <li class="nav-item">
              <a class="nav-link" href="<?php echo ADMINURL; ?>/admins/login-admins.php">login
              </a>
          </li>
          <?php else : ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo ADMINURL; ?>">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
         
          <li class="nav-item dropdown">
            <a class="nav-link  dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo $_SESSION['email']; ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?php echo ADMINURL; ?>/admins/logout.php">Logout</a>
              
          </li>
          <?php endif; ?>
                          
          
        </ul>
      </div>
    </div>
    </nav>
    <div class="container-fluid">