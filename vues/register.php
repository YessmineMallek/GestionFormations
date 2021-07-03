
<?php
  session_start();
  $login="";
  $password="";
  $email="";
  $name="";
  $cin="";
  $dateNaiss="";
  if(isset($_POST['login']))
  {
       if (!empty($_POST['login']))
        {
          $login=$_POST['login'];
          $_SESSION['login']=$login;

        }
}
if(isset($_POST['psw']))
  {
       if (!empty($_POST['psw']))
        {
          $password=$_POST['psw'];
        }
}
if(isset($_POST['email']))
  {
       if (!empty($_POST['email']))
        {
          $email=$_POST['email'];
        }
}
if(isset($_POST['email']))
  {
       if (!empty($_POST['email']))
        {
          $email=$_POST['email'];
        }
}
if(isset($_POST['name']))
  {
       if (!empty($_POST['name']))
        {
          $name=$_POST['name'];
        }
}
if(isset($_POST['cin']))
  {
       if (!empty($_POST['cin']))
        {
          $cin=$_POST['cin'];
        }
}
if(isset($_POST['BirthDate']))
  {
       if (!empty($_POST['BirthDate']))
        {
          $dateNaiss=$_POST['BirthDate'];
        }
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Inscription</title>
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
    * {box-sizing: border-box}

/* Full-width input fields */
  input[type=text], input[type=password],input[type=date] {
   
  width: 100%;
  padding: 15px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 2px solid #6495ed;
  border-radius: 4px;
}
  
}

input[type=text]:focus, input[type=password]:focus,input[type=date]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-top: 50px;
}

/* Set a style for all buttons */
button {
  background-color: #a072ca;
  color: white;
  padding: 10px 20px;
  margin:11px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color:#5564f0;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 17px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}
form{
 
  border:1px solid #ccc;
float: right;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
    width: 100%;
  }
  .color
    {
        border: 2px solid red;
        color: red;
        display:inline-block ;
    }
}
h1
{
  
  font-family: "Lucida Console", "Courier New", monospace;
  color:DodgerBlue;

}


    </style>

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
        <li><a href="index.html">Acceuil</a></li>
        <li>S'inscrire</li>
      </ol>
      <h2>S'inscrire</h2>

    </div>
  </section><!-- End Breadcrumbs -->
  

  <!-- ======= Hero Section ======= -->
  <section id="hero" >

    <div class="container" >
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">

          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start" style="width: auto;">
               
               
               
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" name="f1" >
                    <div class="container">
                      <h1>S'inscrire</h1>
                     
                      <div>
                      <label for="name"><b>Nom Prenom</b></label>
                      <input type="text" placeholder="Enter your name" name="name" required>
                    </div>  


                    <div>
                      <label for="cin"><b>cin</b></label>
                      <input type="text"  name="cin" id ="cin" pattern="[0-9]{8}" placeholder="Entrer CIN" onfocusout="VerifCin()"required>
            </div>
                      <label for="birthdate"><b>date de naissance</b></label>
                      <input type="date" placeholder="Entrer votre date de naissance" name="BirthDate"  id="BirthDate" onfocusout="VerifDate()" required>
                      
                      <label for="email"><b>Email</b></label>
                      <input type="text" placeholder="Entrer votre Email" name="email" id="email"  onfocusout="VerifEmail()" required>
                    
                    
                    
                      <div id="myModalEmail" class="modal">

                          <!-- Modal content -->
                          <div class="modal-content">
                            <span class="closeEmail">&times;</span>
                            <p>Some text in the Modal..</p>
                          </div>

                        </div>
                                              
                      
                      <label for="login"><b>Nom d'utilisateur</b></label>
                      <input type="text" placeholder="Entrer  login" name="login" required>
                  
                      <label for="psw"><b>mot de passe</b></label>
                      <input type="password" placeholder="Entrer mot de passe" name="psw" pattern=".{8,}" id="password"  onfocusout="VerifMotDePasse()" required>
                      <span id ="errorPassword" style="color: red;"></span><br>
                      
                      
                      
                      <label for="psw-repeat"><b>Répéter le mot de passe</b></label>
                      <input type="password" placeholder="Repeter le mot de passe" name="psw-repeat"  id="psw-repeat" onfocusout="identique()">
                      <span id="errorPasswordRepeat" style="color: red;"></span><br>
                      <label>
                        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
                      </label>
                  
                      <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a></p>
                  
                      <div class="clearfix">
                        
                        <button type="button" class="cancelbtn" >Cancel</button>
                        <button type="submit" class="signupbtn" name="SignUp">Sign Up</button>
                      </div>
                    </div>
                  
                  </form>
                
                <script>
                  function VerifEmail()
                 {
  
                   var emailobj=document.getElementById("email").value;
                   if (email!= "" && emailobj.indexOf('@') != emailobj.lastIndexOf('@'))
                    {
                  
                     alert ("l'email doit contenir un seul @");
                    }
                   
            
                  }
                function VerifMotDePasse()
                {
                  var password=document.getElementById("password");
                  var password2=document.getElementById("password").value;

                 if (password2!="" && !password.checkValidity())
                 {
                          
                    alert("le mot de passe doit contenir aux moins 8 caractères");
                  }
                  
                }
                function identique()
                {
                  var pswRepeat=document.getElementById("psw-repeat").value;
                  var password=document.getElementById("password").value;          
                  if ( password!= "" && pswRepeat!=password)
                  {    alert("Le mot de passe n'est identique");}
                
                }
                function VerifDate()
                {
                  var date =document.getElementById("BirthDate").value;
                   d = new Date();
                  
                   dateNaiss=new Date(date);
                   if(date!= "" && dateNaiss!=  null && dateNaiss>d)
                    {
                      alert ("la date de naissance doit etre inférieur ou égal a la date actuelle");
                    }


                }
                function VerifCin()
                {
                  var cin=document.getElementById("cin") ;
                  var cin2=document.getElementById("cin").value ;
                 
                  
                    if (cin2!="" && !cin.checkValidity())
                        alert("le cin doit contenir 8 numéro");
                  
                   
                 
                }
                
              
                </script>


            </div>
          </div>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="assets/img/features-2.png" class="img-fluid" alt="" style="padding-top: 20%;">
        </div>
      </div>
    </div>


  </section><!-- End Hero -->
  <?php
  include_once('..\DAO\Utilisateur.php');
    if (isset($_POST['SignUp']))
    {
      //echo  "<script>alert('here');</script>";
      if ($login!="" && $password!="" && $email!="" && $name!="" && $cin!="" && $dateNaiss!="" )    
      {
      
        $u=new Utilisateur($login,$password,$name,$cin,$dateNaiss,$email,1);
          $rep=Utilisateur::ajouter_Utilisateur($u);
          if ($rep>0)
          {
              echo "<script>alert('ajout effectué avec succes');
              window.location.href='acceuilU.php';
              
              </script>";

          }

      }
    }
      else
      {
        echo "<script>alert('veuillez remplir tous les champs');";
      }
  
      

?>
 

  

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

  