<?php
  
  
  interface ReservableInterface{
    
    public function reserver(Client $client, DateTime $dateDebut, int $nbJours): Reservation;
    
  }
  
  
    abstract class Vehicule {
    
     protected  $id;
     protected $immatriculation;
     protected $marque;
     protected $modele;
     protected $prixJour;
     protected $disponible;
     
     public function getDisponible(){
       return $this->disponible;
     }
     
     
     public function __construct($id,$immatriculation,$marque,$modele,$disponible)
     {
       $this->id = $id;
       $this->immatriculation = $immatriculation;
       $this->marque = $marque;
       $this->modele = $modele;
       $this->prixJour = $prixJour;
       $this->disponible = $disponible;
     }

     public function afficherDetails(){
      
     echo ( 'immatriculation :' . $this->immatriculation . ' marque :' . $this->marque . 'prixJour :' . $this->prixJour . 'disponible:' . $this->disponible ) ;
      
    }
    
     public function calculerPrix(int $jours): float;
     public function estDisponible(): bool;
     abstract public fubction getType(): string;

  }
  
  class Voiture extand Vehicule implement ReservableInterface {
     
     private $nbPortes;
     private $transmission;
     
     
     
     public function __construct($id,$immatriculation,$marque,$modele,$nbPortes,$disponible,$transmission)
     {
        parent::__construct($id,$immatriculation,$marque,$modele,$disponible);
        $this->nbPortes = $nbPortes;
        $this->transmission = $transmission;
     }
     
    public function reserver(Client $client, DateTime $dateDebut, int $nbJours): Reservation;
    
    public function getType(){
       
       
       return 'Voiture' ;
      
    }
    
     public function afficherDetails(){
      
      return parent::afficherDetails() . 'nbPortes :' . $this->nbPortes . 'transmission :' . $this->transmission;
      
      
    }
  
    
  }
  
  class Moto extand Vehicule implement ReservableInterface{
    
    private $cylindree;
    
     public function __construct($id,$immatriculation,$marque,$modele,$disponible,$cylindree)
     {
        parent::__construct($id,$immatriculation,$marque,$modele,$disponible);
        $this->cylindree = $cylindree;
     }
     
     
     public function reserver(Client $client, DateTime $dateDebut, int $nbJours): Reservation;
    
    public function getType(){
       
       
       return 'Moto' ;
      
    }
    
     public function afficherDetails(){
      
      return parent::afficherDetails() . 'cylindree :'$this->$cylindree ;
      
  
    }
  
  }
  
  class Camion extand Vehicule implement ReservableInterface{
    
    private $capaciteTonnage;
    
     public function __construct($id,$immatriculation,$marque,$modele,$disponible,$capaciteTonnage)
     {
        parent::__construct($id,$immatriculation,$marque,$modele,$disponible);
        $this->capaciteTonnage = $capaciteTonnage;
     }
     
     
    public function reserver(Client $client, DateTime $dateDebut, int $nbJours): Reservation;
    
    public function getType(){
       
       
       return 'Camion' ;
      
    } 
  
    
     public function afficherDetails(){
      
      return parent::afficherDetails() . 'cylindree :' . $this->cylindree ;
      
    }
  
  }
  
  abstract class Personne{
    
    protected $nom;
    protected $prenom;
    protected $email;
    
    public function __construct($nom, $prenom, $email){
      
      $this->nom = $nom;
      $this->prenom = $prenom ;
      $this->email = $email ;
      
    }
    
    abstract public function afficherProfil();
    
  }
  
  class Client extand Personne{
    
    private $numeroClient;
    private Reservation $reservations = [];
    
    public function __construct($nom,$prenom,$email,$numeroClient,$reservations){
      
      parent::__construct($nom, $prenom, $email);
      $this->numeroClient = $numeroClient ;
      $this->reservations = $reservations ;
    }
    
    public function afficherProfil(){
      
      echo( 'nom : ' . $this->nom . 'prenom : ' . $this->prenom . 'email : ' .$this->email . 'numero de Client :'$numeroClient);
      foreach($reservations as $reservation){
        echo($reservation) ;
      }
    }
    
    public function ajouterReservation(Reservation $r){
      
      $this->reservation += $r ;
    };
    
    public function getHistorique(){
      
      foreach($reservations as $reservation){
        echo($reservation) ;
      }
      
    }
    
  }
  
 
 class Agence{
   private $nom;
   private $ville;
   private Vehicule $vehicules = [] ;
   private Client clients= [] ;
  
  
   public function __construct($nom, $ville, $vehicules, $clients){
      $this->nom = $nom
      $this->ville = $ville;
      $this->vehicules = $vehicules;
      $this->clients = $clients;
   }
   
   public function ajouterVehicule(Vehicule $v){
     
     $vehicules += $v ;
   }
   
   
   rechercherVehiculeDisponible(string $type){
     
     foreach($vehicules as $vehicule){
         if($Vehicule->getType() != $type){
            echo 'type not found';
         }
         
         else{
           
                  if($Vehicule->getDisponible() == 'disponible')
               {
                 
                  echo 'cette type de Vehicule est disponible';
               }
               else
               {
                 'pas disponible';
               }
         
         }
        
     }
   }
   
   
   
   faireReservation(Client $client, Vehicule $v, DateTime $dateDebut, int $nbJours): Reservation{
     
     
   }
   
    

   
 }
  
 class Reservation{
   
   private Vehicule $vehicule;
   private Client $client; 
   private $dateDebut;
   private $nbJours;
   private $statut;
   
   
   public function __construct($vehicule , $client , $dateDebut , $nbJours , $statut){
     
     
     $this->vehicule = $vehicule;
     $this->client = $client;
     $this->dateDebut = $dateDebut;
     $this->nbJours = $nbJours;
     $this->statut = $statut;
     
   }
   
   



   
   
 }
  
  
  
  
  
?>