<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Acceuil Administration</title>
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<style>
 table {
border: medium solid #6495ed;
border-collapse: collapse;
width: 100%;
margin: bottom 50px;

}
th {
font-family: monospace;
border: thin solid #6495ed;

padding: 5px;
background-color: #D0E3FA;
}
td {
font-family: sans-serif;
border: thin solid #6495ed;

padding: 5px;
text-align: center;
background-color: #ffffff;
}
caption {
font-family: sans-serif;
}
label
{
  font-family: monospace;
  color:#6495ed;
  font-size: 15px;
}

input[type=text],textarea,input[type=number],input[type=date] {
  width: 100%;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  resize: vertical;
}

input[type=button],input[type=submit] {
  background-color: #4154f1;
  color: white;
  padding: 10px 10px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
/* Modal Content/Box */
#myModal {
  background-color:rgb(204, 204, 204,0.7);
  align:center;
 
}
.modal-header
{
  color:white;
  background-color:#012970;
  font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
  align:center;
}

/* The Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}
.modal-content
{
  width: 60%;
}
form
{
  padding-top:50px;
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
      <div class="btn-group" role="group" aria-label="Basic example" >
        </div>
           <button type="button" class="btn btn-primary" id="myBtnDeconnection" data-toggle="modal" data-target="#myModal">Déconnexion</button>
               

              <!-- Modal -->
              <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="false" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Deconnection</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close" > <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                    <div class="modal-body">
                    Voulez-vous vraiment de déconnecter ?                     </div>
                    <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">non</button>
                      <button type="submit" name="deconnection" class="btn btn-primary">oui</button>
                  </div>
                 
                  </form>
                  </div>
                </div>
              </div>
        <?php
        if(isset($_POST['deconnection']))
        {
          echo "<script>document.location.href='index.html';</script>";
          session_destroy();

                }
        ?>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->


  
  <section class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a >Accueil</a></li>
        <li>Accueil Admin</li>
      </ol>
      <h2>Accueil Admin</h2>

    </div>
  </section><!-- End Breadcrumbs -->

  <!-- ======= Hero Section ======= -->
  <section id="hero"  >

    <div class="container">
      <div class="row">
      
       


      <?php
                 
                 include_once('..\DAO\Reservation.php');
                 include_once('..\DAO\Formation.php');

                 $nbTotal=0;
                 $intitule="";
                 $nbreConfirme=0;
                  $enAttente=0;
                 echo "<table align='center' name='tab'>";
                 echo "<tr><th> Intitulé de la formation</th><th>Nombre de place total   </th><th>Le nombre de réservations confirmées  </th><th>Le nombre de réservation en attentes</th><th> Suppression</th></tr>";
                 $selection=Formation::FindAll();
         
            
                  foreach($selection as $r)
                  {
                    $nbTotal=$r->nbPlace;
                    //echo $nbTotal."<br>";
                    $intitule=$r->intitulé;
                    //echo $intitule."<br>";
                    $nbreConfirme=Reservation::findAllReservationConfirmé($r->id);
                   // echo $nbreConfirme."<br>";
                    $enAttente=Reservation::findAllReservationEnAttente($r->id);
                    //echo $enAttente.'<br>';
                    echo "<tr><td id=$r->id>$intitule</td>
                    <td>$nbTotal</td>
                    <td>$nbreConfirme</td>
                    <td><a href='ReservationEnAttente.php?id=$r->id'>$enAttente</a></td>
                    <td><input type=\"button\" id=\"myBtnSupp\" data-toggle='modal' data-target='#myModalSupp' value=\"supprimer\" onclick=\"SupFormation($r->id)\"></input></td>
                    </tr>";

                  }
                 
                 echo "</table><br><br>";
                
          ?>
      
 <form method="" name='f1'>       
        <div class="container" style='width:70%;height:50%;'>
        <h4>Ajout d'une formation</h4>

          <label>Intitulé</label>
          <input type="text" name="intitule" required>
          <label>Formateur</label>
          <input type="text" name="formateur" required>
          <label>Description</label> 
          <textarea  name="description" required></textarea>
          <label>Date</label>
          <input type="date" name="date" required>
          <label>Prix</label>
          <input type="number" name="prix" required>
          <label>Nombre de places</label>
          <input type="number" name="nombredeplaces" required>

        <input type="button" value="Ajouter" name="ajouter" onclick="ajouterFormation(document.f1.intitule.value,document.f1.formateur.value,document.f1.description.value,document.f1.date.value,document.f1.prix.value,document.f1.nombredeplaces.value)">
  
        </div>
    </form>



        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
        </div>
      </div>
    </div>
    <!--<img src="assets/img/hero-img.png" class="img-fluid" alt="">-->

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
<script>
        function SupFormation(x)
            {
                
                document.location.href="Supprimer.php?valintu="+x;
            }
            function ajouterFormation(int,f,des,date,pr,nbrePlace)
          {
           
          window.location.href="AjoutFormation.php?inti="+int+"&forma="+f+"&des="+des+"&date="+date+"&prix="+pr+"&nbre="+nbrePlace;
          }



        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</html>
