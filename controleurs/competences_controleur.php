<?php
class CompetencesControleur{
  // ATTENTION : Les noms des fonctions dans le contrôleur correspondent
  // aux actions dans le registre de routage
  public function show(){
    // Utiliser le modèle pour récupérer la liste des compétences
    require_once('modeles/competence_modele.php');
    $competences = Competence::show();

    // Stocker les compétences pour les transmettre
    $_SESSION['competences'] = $competences;

    // Rediriger vers la vue pour afficher les compétences
    require_once('vues/competences_vue.php');
  }

  // Fonction de création d'un employé
  public function create(){
    // Récupérer le nom et le prenom du nouvel employé
    if(isset($_POST['code']) && isset($_POST['nom'])
      && $_POST['code'] != null && $_POST['nom'] != null){
      $codeC = $_POST['code'];
      $nomC = $_POST['nom'];

      // Utiliser le modèle pour insérer dans la BDD
      require_once('modeles/competence_modele.php');
      Competence::create($code, $nom);
      $this->show();
    }
    else{
      require_once('controleurs/root.php');
      $_SESSION['msg'] = "Données manquantes";
      return Route::routage('demarrage', 'erreur');
    }
  }

  // Fonction de suppression d'un employé
  public function delete(){
    if(isset($_POST['id']) && $_POST['id'] != null){
      $id = $_POST['id'];
      require_once('modeles/competence_modele.php');
      Competence::delete($id);
      $this->show();
    }
    else{
    require_once('controleurs/root.php');
    $_SESSION['msg'] = "Code manquant";
    return Route::routage('demarrage', 'erreur');
    }
  }
}
?>
