<?php
class Employe{
  // Les membres sont calqués sur les colonnes de la table de la bcadd
  // Pour protéger les membres les mettre en 'private'
  public $matricule;
  public $nom;
  public $prenom;

  function __construct($matricule, $nom, $prenom){
    $this->matricule = $matricule;
    $this->nom = $nom;
    $this->prenom = $prenom;
  }

  // Afficher tous les employés
  public static function show(){
    $list = array();

    include_once('utils.php');
    $connexion = connect();
    $sql = "SELECT * FROM employes;";
    $result = query($connexion, $sql);

    foreach($result as $e){
      $list[] = new Employe($e['matricule'], $e['nom'], $e['prenom']);
    }

    disconnect($connexion);
    return $list;
  }

  // Afficher un seul employé
  public static function find($id){
    $list = array();

    include_once('utils.php');
    $connexion = connect();
    $sql = 'SELECT * FROM employes WHERE matricule=".$id.";';
    $result = query($connexion, $sql);

    foreach($result as $e){
      $list[] = new Employe($e['matricule'], $e['nom'], $e['prenom']);
    }

    disconnect($connexion);
    return $list;
  }

  // Créer un employé
  public function create($nom, $prenom){
    include_once('utils.php');
    $connexion = connect();
    $sql = 'NSERT INTO employes (nom, prenom) VALUES ('.$nom.','.$prenom.');';
    execute($connexion, $sql);
    disconnect($connexion);
  }

  // Effacer un employé
  public static function delete($id){
    include_once('utils.php');
    $connexion = connect();

    // ATTENTION : il faudrait rajouter la gestion de l'intégrité !
    $sql = "DELETE FROM avoir WHERE matricule=".$id.";";
    execute($connexion, $sql);

    // Effacer l'employé
    $sql = "DELETE FROM employes WHERE matricule=".$id.";";
    execute($connexion, $sql);
    disconnect($connexion);
  }
}
?>
