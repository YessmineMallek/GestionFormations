<?php
session_start();

$login="";
$password="";
if(isset($_GET['uname']))
  {
       if (!empty($_GET['uname']))
        {
          $login=$_GET['uname'];
          $_SESSION['login']=$login;
        }
}
if(isset($_GET['psw']))
  {
       if (!empty($_GET['psw']))
        {
          $password=$_GET['psw'];
        }
}


  include_once('..\DAO\connetion.php');
  $selection=$conn->query("select * from utilisateur where login like'".$login."' and password like '".$password."'")or die(print_r($conn->errorInfo()));
  if ($selection->rowCount()>0 )
  {
      $selection->setFetchMode(PDO::FETCH_BOTH); //setFetchMode() permet d’indiquer 
      $rows=$selection->fetchAll();
      foreach($rows as $u)
        {
          if ($u['role']==0)
          {

            header('Location: acceuilU.php');

          }else if($u['role']==1)
            { 
              header('Location: acceuilAdmin.php');
            }
            
          }
  }else
  {
      echo"<script>alert('nom d\'utilisateur ou mot de passe incorrect ');
      document.location.href='index.html';
      
      </script>";
      
         
    }  
    
        
    

?>



