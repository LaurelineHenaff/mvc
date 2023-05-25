<?php
class Route{
  // Contrôleur de routage principal, il contient toutes les fonctions qui
  // permettent de rediriger les requêtes vers les contrôleurs ciblés.

  //  Fonction qui eppelle le contrôleur ciblé avec l'action ciblée
  static function call($controleur, $action){
    // Etablir la correspondance entre $controleur et la classe
    // controleur pertinente
    include('controleurs/'.$controleur.'_controleur.php');

    // Créer une instance du contrôleur ciblé par $controleur
    switch($controleur){
      case 'demarrage':
        $ctrl = new DemarrageControleur();
        break;
      case 'employes':
        $ctrl = new EmployesControleur();
        break;
      case 'competences':
        $ctrl = new CompetencesControleur();
        break;
    }

    // Executer l'action cible du controleur
    $ctrl->{$action}();
  }

  // Fonction de routage réelle
  // 1 : Vérifier que le contrôleur et l'action existe
  // 2 : Utiliser la fonction "call" pour appeler l'action du contrôleur cible
  static function routage($controleur, $action){
    // Registre des contrôleurs et des actions pour contrôleurs
    static $registre = array('demarrage'=>['accueil', 'erreur'],
                              'employes'=>['show', 'create', 'delete'],
                              'competences'=>['show', 'create', 'delete']);

    // Vérifier la validité de $controleur
    if(array_key_exists($controleur, $registre)){
      // Vérifier la validité de $action
      if(in_array($action, $registre[$controleur])){
        // Appel de $action de $controleur
        Route::call($controleur, $action);
      }
      else {
        // Erreur sur l'action
        $_SESSION['msg'] = "Contrôleur : ".$action." non valide.";
        Route::call('demarrage', 'erreur');
      }
    }
    else{
        // Erreur sur le contrôleur
        $_SESSION['msg'] = "Contrôleur : ".$controleur." non valide.";
        Route::call('demarrage', 'erreur');
    }
  }
}
?>
