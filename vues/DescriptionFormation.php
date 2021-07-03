<?php
   $score=0;
   $nbScore=0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Description Formation</title>
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

 <style>
.lesBoutons
{
    margin-left:  70px;
}
form
{
    padding: 70px;
}
</style>

</head>
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a  class="logo d-flex align-items-center">
          <img src="assets/img/logo.png" alt="">
          <span style="padding: 0 0 0 25px;">Gestion Formation</span>
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
        <li><a href="acceuilU.php">Acceuil Utilisateur</a></li>
        <li>Description Formation</li>
      </ol>
      <h2>Description Formation</h2>

    </div>
  </section><!-- End Breadcrumbs -->

   <!-- ======= Hero Section ======= -->
   <section id="hero"  >

    <div class="container">
        <div class="row">
            
                     <form name='f1'>

                        <?php
                            include_once("..\DAO\Formation.php");
                          
                            $id="";
                           $id=$_GET['idfor'];
                            $f=Formation::FindById($id);
                            echo $f->desc;
                         
                              $score=$f->score;
                              $nbScore=$f->nbScore;
                          
                            
                    
                            
                            ?>
                            <h4>Veuillez donner un score entre 0 et 5 à cette formation</h4>
                            <div class="lesBoutons"  >
                            <input type="radio" name="score" value="1">1</input><br>
                            <input type="radio" name="score" value='2'>2</input><br>
                            <input type="radio" name="score" value='3'>3</input><br>
                            <input type="radio" name="score" value='4'>4</input><br>
                            <input type="radio" name="score" value='5'>5</input><br>
                            </div>
                            <input type="button" value="valider" name="valider" onClick="calculeScore(<?php echo $score ;?>,<?php echo $nbScore; ?>,<?php echo $id; ?>)" >           
                       
                      </form>
                   <script>
                    function calculeScore(s,nb,id)
                    {
                      score=0;    
                      newS=0;
                          newS=document.f1.score.value;
                        
                          score=((nb*s)+Number(newS))/(nb+1);
                     
                          nb=nb+1;
                         document.location.href="calculeScore.php?score="+score+"&nbscore="+nb+"&id="+id;


                         

                    }


                   </script>
               

       
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