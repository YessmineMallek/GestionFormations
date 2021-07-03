<?php
    class Utilisateur
    {
        private $login;
        private $password;
        private $nom;
        private $cin;
        private $date_naiss;
        private $email;
        private $role;
        function __construct($l,$pass,$nom,$cin,$date,$email,$role)
        {
            $this->login=$l;
            $this->password=$pass;
            $this->nom=$nom;
            $this->cin=$cin;
            $this->date_naiss=$date;
            $this->email=$email;
            $this->role=$role;
        }
        public function __get($attr) {
            if (!isset($this->$attr)) 
                return "erreur";
            else return ($this->$attr);}
        public function __set($attr,$value) 
        {
                $this->$attr = $value; 
        }
        public static function ajouter_Utilisateur($u)
        {
            include_once('connetion.php');
            $rep=$conn->exec("insert into utilisateur(login,password,nom,cin,date_naiss,email,role) values('$u->login','$u->password','$u->nom','$u->cin','$u->date_naiss','$u->email',0)")or die(print_r($conn->errorInfo()));      
           return $rep;
        }
        public static function FindAll()
        {
            include_once('connetion.php');
            $selection=$conn->query("select * from utilisateur")or die(print_r($conn->errorInfo()));
            $lesUtilisateur=[];
            foreach($selection as $utili)
            {
                $u =new Utilisateur($utili['login'],$utili['password'],$utili['nom'],$utili['cin'],$utili['date_naiss'],$utili['email'],$utili['role']);
                $lesUtilisateur[]=$u;
            }
            return $lesUtilisateur;
        }
       
    }


?>