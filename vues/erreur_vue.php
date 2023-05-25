<?php
  if(isset($_SESSION['msg'])){
    echo "ERREUR : ".$_SESSION['msg'];
  }
  else{
    echo "Il y a un problème...";
  }
?>
