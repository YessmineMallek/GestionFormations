<?php

class Formation
{
    private $id;
    private $intitulé;
    private $desc;
    private $formateur;
    private $date;
    private $nbPlace;
    private $nbReservation;
    private $prix;
    private  $score=0;  
    private $nbScore=0;
    
    function __construct($id,$inti,$de,$forma,$date,$nbPlace,$nbReservation,$prix,$score,$nbScores)
     {
    
            $this->id=$id;
            $this->intitulé=$inti;
            $this->desc=$de;
            $this->formateur=$forma;
            $this->date=$date;
            $this->nbPlace=$nbPlace;
            $this->nbReservation=$nbReservation;
            $this->prix=$prix;
            $this->score=$score;
            $this->nbScore=$nbScores;

    }
    
        public function __get($attr) {
            if (!isset($this->$attr)) 
                return "erreur";
            else return ($this->$attr);}
        public function __set($attr,$value) 
        {
                $this->$attr = $value; 
        }
        public function affichEtat()
        {
            
          
           // echo 'here';
            include_once("Reservation.php");
            $reser=Reservation::findAll($this->id);
            if($this->nbPlace == $this->nbReservation)
            {
                return "la formation est complet"   ;              
             }
            if ($reser==0)
                return "attente";
            else if ($reser==1)
                     return "confirmé";
                else
                    return "<a href=Participer.php?intu=$this->id>je veux participer</a>";
           

            

        }
      
        public function affichsatars($s)
        {
           $ch="";
           if ($s<5)
           {
               for($i=1;$i<=$s;$i++) 
                 $ch=$ch."*";
           }
           if ($s>=5)
           {
               
                 $ch=$ch."*****";
           }
         if ($s<=0)
            $ch.="le score egale 0";
                
           
            return $ch;
        }
        
        
        public function __toString()
        {
            $nbDisponible= $this->nbPlace- $this->nbReservation;
          
            
            
            return "<tr><td><a href='DescriptionFormation.php?idfor=$this->id'>$this->intitulé</a></td>
            <td>$this->formateur</td>
            <td>$this->date</td><td>$this->prix</td><td>$nbDisponible</td> 
            <td>".
                   $this->affichsatars($this->score)
            ." </td>
             <td>".
             $this->affichEtat()
            
            ."</td> </tr>";
           
            
        }
    
        public static function FindAll()
        {
            
            include('connetion.php');
            $selection=$conn->query("select * from formation")or die(print_r($conn->errorInfo()));
            $lesFormations=[];
            foreach($selection as $utili)
            {
                $u =new Formation($utili['id'],$utili['intitule'],$utili['description'],$utili['formateur'],$utili['date'],$utili['nbPlace'],$utili['nbReservation'],$utili['prix'],$utili['score'],$utili['nbScore']);
                
                $lesFormations[]=$u;
            }
            return $lesFormations;

        }
        public static function Update ($nbReservation,$f)
        {
            include('connetion.php');
            $rep=$conn->exec("update formation set  nbReservation =".$nbReservation." where id='".$f->id."'")or die(print_r($conn->errorInfo()));
            
            if ($rep>0)
            {
                echo "<script> alert ('update effectué avec succes');</script>";

            }
        }
        public static function UpdateScore ($s,$nb,$id)
        {
            include('connetion.php');
            $rep=$conn->exec("update formation set score=".$s." ,nbScore=".$nb." where id='".$id."'")or die(print_r($conn->errorInfo()));

            return $rep;
        }
        public static function FindById($newIn)
        {
            
            include('connetion.php');
            $u='';
            $selection=$conn->query("select * from formation where id='".$newIn."'")or die(print_r($conn->errorInfo()));
            
            foreach($selection as $utili)
            {
                $u =new Formation($utili['id'],$utili['intitule'],$utili['description'],$utili['formateur'],$utili['date'],$utili['nbPlace'],$utili['nbReservation'],$utili['prix'],$utili['score'],$utili['nbScore']);
               
            }
            return $u;

        }
        
        public static function Delete($id)
        {           
             include('connetion.php');
             $rep=$conn->exec("delete from formation where id='".$id."'")or die(print_r($conn->errorInfo()));
            return $rep;
        }
        public static function AjouterFormation($u)
        {
          
            include('connetion.php');
            $rep=$conn->exec("insert into formation(intitule, formateur, description, date, nbPlace, prix) values('$u->intitulé','$u->formateur','$u->desc','$u->date',$u->nbPlace,$u->prix)")or die(print_r($conn->errorInfo()));      
            return $rep;
            
        }
        }
    




?>





