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
if(isset($_SESSION['competences'])){
  $competences = $_SESSION['competences'];
  echo '<br>';
  echo '<table>';
  echo '<tr><th>Code</th><th>Nom</th></tr>';
  foreach($competences as $c){
    echo "<tr><td>".$c->codeC."</td>";
    echo "<td>".$c->nomC."</td>";

    // Pour effacer une compétence
    echo "<td>";
    echo "<form class='' action='index.php' method='post'>";
    echo "<input type='hidden' name='controleur' value='competences'>";
    echo "<input type='hidden' name='action' value='delete'>";
    echo "<input type='hidden' name='id' value=".$c->codeC.">";
    echo "<input type='submit' value='Supprimer'>";
    echo "</form>";
    echo "</td></tr>";

  }
  echo "</table>";
}
?>
<br>
<!-- Formulaire de création d'un employé -->
<form class='ajoutCompetence' action='index.php' method='post'>
  Ajouter une compétence<br><br><vr>
  Code : <input type='text' name='code'>
  &nbsp; &nbsp; &nbsp;
  Nom : <input type='text' name='nom'>
  <input type='hidden' name='id' value='create'>
  <input type='submit' value='Ajouter'>
</form>
</html>
