<?php
  // Un brin de nettoyage (on peut aussi le cibler du 'controleur' et 'action')
  unset($_POST);
  unset($_SESSION);
?>
<head>
  <style>
    body, table, th, td{
      text-align: center;
    }

   table{
      display: flex;
      justify-content: center;
      padding-top: 1.5rem;
    }

    body{
      text-align: center;
      padding-top: 1.5rem;
    }

    .employes, .competences{
      padding-top: 1.5rem;
    }

    a{
      text-decoration: none;
    }
  </style>
</head>
<h1 style="font-weight: normal;">Choisissez une action</h1>
<!--
    Toutes les fonctions seront comme ci-après
    On passera toujours par index.php
  -->

<form class="employes" action="index.php" method="post">
  Voir tous les employés
  <input type="hidden" name="controleur" value="employes">
  <input type="hidden" name="action" value="show">
  <input type="submit" value="Go">
</form>
<br>
<br>
<form class="competences" action="index.php" method="post">
  Voir toutes les compétences
  <input type="hidden" name="controleur" value="competences">
  <input type="hidden" name="action" value="show">
  <input type="submit" value="Go">
</form>
