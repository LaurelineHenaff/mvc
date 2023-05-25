<?php
class Competence{
  // Les membres sont calqués sur les colonnes de la table de la bcadd
  // Pour protéger les membres les mettre en 'private'
  public $codeC;
  public $nomC;

  function __construct($code, $competence){
    $this->codeC = $code;
    $this->nomC = $competence;
  }

  // Afficher toutes les compétences
  public static function show(){
    $list = array();

    include_once('utils.php');
    $connexion = connect();
    $sql = "SELECT * FROM competences;";
    $result = query($connexion, $sql);

    foreach($result as $c){
      $list[] = new Competence($c['codeC'], $c['nomC']);
    }

    disconnect($connexion);
    return $list;
  }

  // Afficher une seule compétence
  public static function find($id){
    $list = array();

    include_once('utils.php');
    $connexion = connect();
    $sql = "SELECT * FROM competences WHERE codeC=".$id.";";
    $result = query($connexion, $sql);

    foreach($result as $c){
      $list[] = new Competence($c['codeC'], $c['nomC']);
    }

    disconnect($connexion);
    return $list;
  }

  // Créer une compétence
  public function create($codeC, $nomC){
    include_once('utils.php');
    $connexion = connect();
    $sql = "insert into competences (codeC, nomC) values ('".$codeC."','".$nomC."');";
    execute($connexion, $sql);
    disconnect($connexion);
  }

  // Effacer une compétence
  public static function delete($id){
    include_once('utils.php');
    $connexion = connect();

    // ATTENTION : il faudrait rajouter la gestion de l'intégrité !
    $sql = "DELETE FROM avoir WHERE codeC=".$id.";";
    execute($connexion, $sql);

    // Effacer une compétence
    $sql = "DELETE FROM competences WHERE codeC=".$id.";";
    execute($connexion, $sql);
    disconnect($connexion);
  }
}
?>
