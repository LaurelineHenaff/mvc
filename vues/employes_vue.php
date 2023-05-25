<html>
  <style>
   table{
      display: flex;
      justify-content: center;
      padding-top: 1.5rem;
    }

    body{
      text-align: center;
      padding-top: 1.5rem;
    }

    td{
      padding: 1.5rem;
    }

    .ajoutCompetence{
      text-align: center;
      padding-top: 1.5rem;
    }

    th{
      font-weight: normal;
    }

    a{
      text-decoration: none;
    }
  </style>
<?php
if(isset($_SESSION['employes'])){
  $employes = $_SESSION['employes'];
  echo '<br>';
  echo '<table>';
  echo '<tr><th>Matricule</th><th>Nom</th><th>Prénom</th></tr>';
  foreach($employes as $e){
    echo "<tr><td>".$e->matricule."</td>";
    echo "<td>".$e->nom."</td>";
    echo "<td>".$e->prenom."</td>";

    // Pour effacer un employé
    echo "<td>";
    echo "<form class='' action='index.php' method='post'>";
    echo "<input type='hidden' name='controleur' value='employes'>";
    echo "<input type='hidden' name='action' value='delete'>";
    echo "<input type='hidden' name='id' value=".$e->matricule.">";
    echo "<input type='submit' value='Supprimer'>";
    echo "</form>";
    echo "</td></tr>";

  }
  echo "</table>";
}
?>
<br>
<!-- Formulaire de création d'un employé -->
<form class='' action='index.php' method='post'>
  Ajouter un employé<br><br><br>
  Nom : <input type='text' name='nom'>
  &nbsp; &nbsp; &nbsp;
  Prénom : <input type='text' name='prenom'>
  <input type='hidden' name='id' value='create'>
  <input type='submit' value='Ajouter'>
</form>
</html>
