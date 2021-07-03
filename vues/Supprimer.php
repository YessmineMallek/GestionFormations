<?php
  include_once('..\DAO\Formation.php');
  $idPourSupp=$_GET['valintu'];
  $d=Formation::Delete($idPourSupp);
  if($d>0)
  {
    echo "<script>alert('suppresion effectué avec succes');
 
    
    </script>";
    header("location: acceuilAdmin.php");

  }

?>