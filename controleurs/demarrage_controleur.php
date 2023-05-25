<?php
class DemarrageControleur{
  // ATTENTION = nom des fonctions = nom des actions ! (sensible à la casse)
  public function accueil(){
    require_once('vues/accueil_vue.php');
  }

  public function erreur(){
    require_once('vues/erreur_vue.php');
  }
}
?>
