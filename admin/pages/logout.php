<?php 

    //On détruit la session admin que nous avons crée dans le fichier login.php du dossier page
    unset($_SESSION['admin']);

    //On rédirige vers le dossier parent
    header("Location:../");

?>