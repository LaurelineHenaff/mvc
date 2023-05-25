<?php
class EmployesControleur{
  // ATTENTION : Les noms des fonctions dans le contrôleur correspondent
  // aux actions dans le registre de routage
  public function show(){
    // Utiliser le modèle pour récupérer la liste des employés
    require_once('modeles/employe_modele.php');
    $employes = Employe::show();

    // Stocker les employés pour les transmettre
    $_SESSION['employes'] = $employes;

    // Rediriger vers la vue pour afficher les employés
    require_once('vues/employes_vue.php');
  }

  // Fonction de création d'un employé
  public function create(){
    // Récupérer le nom et le prenom du nouvel employé
    if(isset($_POST['nom']) && isset($_POST['prenom'])
      && $_POST['nom'] != null && $_POST['prenom'] != null){
      $nom = $_POST['nom'];
      $prenom = $_POST['prenom'];

      // Utiliser le modèle pour insérer dans la BDD
      require_once('modeles/employe_modele.php');
      Employe::create($nom, $prenom);
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
      require_once('modeles/employe_modele.php');
      Employe::delete($id);
      $this->show();
    }
    else{
    require_once('controleurs/root.php');
    $_SESSION['msg'] = "Matricule manquant";
    return Route::routage('demarrage', 'erreur');
    }
  }
}
?>
