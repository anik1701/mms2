<?php 
  session_start(); 

  if (!isset($_SESSION['uname'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['uname']);
  	header("location: customer.php");
  }
?>
	<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>
	
	
 <!DOCTYPE html>
  <html lang="en">
  <head>
    <title>customer </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
 <body>
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container-fluid px-lg-5">
	      <a class="navbar-brand" href="#">Bangladesh National Meusium </a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
		   <li class="nav-item"><a href="customer.php" class="nav-link"><b>Home</b></a></li>
           <li class="nav-item"><a href="UserProfile.php" class="nav-link"><b>My Profile</b></a></li>
           <li class="nav-item"><a href="event.php" class="nav-link"><b>Event</b></a></li>
         <li class="nav-item"><a href="ULogout.php" class="nav-link"> <b>Logout</b></a></li>    
    </ul>
  </div>
</nav>
    <!-- END nav -->
	<br>
	<br>
	<br>
    <!-- logged in user information -->
    <?php  if (isset($_SESSION['uname'])) : ?>
    	<h3><p>Welcome <strong><?php echo $_SESSION['uname']; ?></strong></p></h3>
    	<p> <a href="ULogout.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
</div>
    
        <div class="hero-wrap" style="background-image: url('Image/download.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-12 text ftco-animate mt-5 text-center" data-scrollax=" properties: { translateY: '70%' }">
          </div>
        </div>
      </div>
    </div>


<?php include 'includes/footer.php'?>
	
    