<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Réservation en Attentes</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/graduate-icon.png" rel="icon">



  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: FlexStart - v1.2.0
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

 

</head>
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

    <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span style="padding: 0 0 0 25px;">Gestion Formation </span>
      </a>

      <nav id="navbar" class="navbar">
      
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <section class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a>Acceuil</a></li>
        <li><a href="acceuilAdmin.php">Acceuil Administration</a></li>
        <li>Réservation en Attentes</li>

      </ol>
      <h2></h2>

    </div>
  </section><!-- End Breadcrumbs -->

   <!-- ======= Hero Section ======= -->
   <section id="hero">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">

          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
           
              <div class="text-center text-lg-start"style="padding:left 100px;">
              <?php
                 include_once('..\DAO\Reservation.php');
                 include_once('..\DAO\Formation.php');
               
                $id=$_GET['id'];
                $f=Formation::FindById($id);
                echo "<h4>$f->desc</h4>";
                $lesReservations=Reservation::findReservationAttente($f->id);
                
                echo "<ul>";
                foreach($lesReservations as $res)
                {
                    echo $res;
                }
                 echo "</ul>";

              ?>
       
            </div>
          </div>
        </div>
        
      </div>
    </div>

  </section><!-- End Hero -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>