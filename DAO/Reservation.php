<?php
class Reservation {
    private $id;
    private $etat;
    private $login;
    private $id_formation;
    function __construct($etat,$log,$id_formation)
    {
           $this->etat=$etat;
           $this->login=$log;
           $this->id_formation=$id_formation;  

       }
       public function __get($attr) {
           if (!isset($this->$attr)) 
               return "erreur";
           else return ($this->$attr);}
       public function __set($attr,$value) 
       {
               $this->$attr = $value; 
       }
      
       public static  function findAll($id_formation)
       {
        include('connetion.php');
        $utilisateur=$_SESSION['login'];
       
        $selection=$conn->query("select * from reservation where login='".$utilisateur."' and id_formation='".$id_formation."'")or die(print_r($conn->errorInfo()));
       // echo $utilisateur;
        //echo $id_formation;

        $reser=-1;
        foreach ($selection as $ligne)
       {
       
        $reser= $ligne['etat'];

        }
        return $reser;

       }
       public static function ajout($u)
       {
        include('connetion.php');
        $rep=$conn->exec("insert into Reservation(etat,login,id_formation) values($u->etat,'$u->login','$u->id_formation')")or die(print_r($conn->errorInfo()));      
        return $rep;
       }
       
      
        public static  function findAllReservationConfirmé($formation)
       {
        include('connetion.php');
         $nb=0;
        $selection=$conn->query("select etat, COUNT(*) as nb FROM ReSERVATION where id_formation='". $formation."'and etat=1 GROUP BY etat;")or die(print_r($conn->errorInfo()));
        $rows=$selection->fetchAll();       

        foreach ($rows as $res)
        {
           //echo $res['nb'];
            $nb=$res['nb'];
        }
        return $nb;

       }
       public static  function findReservationAttente($formation)
       {
        include('connetion.php');
         $nb=0;
        $selection=$conn->query("select * FROM reservation where id_formation='". $formation."'and etat=0;")or die(print_r($conn->errorInfo()));
        $lesReservations=[];
        foreach ($selection as $res)
        {
           $reservation=new Reservation($res['etat'],$res['login'],$res['id_formation']);
            $lesReservations[]=$reservation;
        
        }
        return $lesReservations;

       }
       public static  function findAllReservationEnAttente($formation)
       {
        include('connetion.php');
         $nb=0;
        $selection=$conn->query("select etat, COUNT(*) as nb FROM ReSERVATION where id_formation='". $formation."'and etat=0 GROUP BY etat;")or die(print_r($conn->errorInfo()));
        $rows=$selection->fetchAll();       

        foreach ($rows as $res)
        {
          // echo $res['nb'];
            $nb=$res['nb'];
        }
        return $nb;

       }
       public function __toString()
       {
        return "<li>$this->id $this->login $this->id_formation <a href='confirmer.php?id=$this->id_formation&log=$this->login'><input type='button' value='confirmer'></a></li>";
       }

       public static function updateReservation ($f,$utilisateur)
       {
           
                include('connetion.php');
                $rep=$conn->exec("update reservation set etat= 1  where login='".$utilisateur."' and id_formation=".$f."")or die(print_r($conn->errorInfo()));
                
                if ($rep>0)
                {
                    echo "<script> alert ('update effectué avec succes');</script>";

                }

       }



}


?>