<?php
  // Connexion en PDO
  function connect(){
    // Données de connexion
    $identifiant = "root";
    $password = "root";
    $serveur = "localhost";
    $bdd = "coursphp";

    // Connexion
    $connexion = null;
    try{
      $connexion = new PDO("mysql:host=".$serveur.";dbname=".$bdd, $identifiant, $password);
      $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        echo 'Echec de connexion'.$e->getMessage();
    }
    return $connexion;
  }

  // Déconnexion
  function disconnect($connexion){
    $connexion = null;
  }

  // Requête sans résultat
  function execute($connexion, $sql){
    $connexion->exec($sql);
  }

  // Requête avec résultat
  function query($connexion, $sql){
    $result = null;
    try{
      // Protection contre l'injection SQL
      $statement = $connexion->prepare($sql);

      // Executer la requête
      $statement->execute();

      // Récupération du résultat
      $result = $statement->fetchAll();
    }
    catch (PDOException $e){
      echo "Echec de requête ".$e->getMessage();
    }

    return $result;
  }
?>
