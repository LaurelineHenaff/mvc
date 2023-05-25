<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>DEMO MVC</title>
    </head>
    <body>
      <header>
        <a href='index.php'>Accueil</a>
      </header>
      <?php
        // Envoyer au noyau de routage le nom du contrôleur et de l'action
        if(isset($_POST['controleur']) && isset($_POST['action'])){
          $controleur = $_POST['controleur'];
          $action = $_POST['action'];
        }
        else{
          // Si rien, on est à l'accueil
          $controleur = 'demarrage';
          $action = 'accueil';
        }

        // Faire le routage
        include_once('controleurs/root.php');
        Route::routage($controleur, $action);
      ?>
    </body>
</html>
