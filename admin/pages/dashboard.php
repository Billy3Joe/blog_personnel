<!-- Affichons la session -->
<h2>Tableau de bord</h2>
<div class="row">
    <?php 
    
        //Mettons dans un tableau $tables les différentes tables que nous voulons analyser
        $tables = [
           
            "Publications"  => "posts",
            "Commentaires" => "comments",
            "Administrateurs" => "admins"
          
        ];

        //Mettons dans un tableau $colors $colors nos différentes couleurs utilisées par les tables
         //Pour utiliser ces couleurs, on va créer une fonction  dans dashboard.func.php qu'on va appéller getColors()
        $colors = [

            "posts"  => "green",
            "comments" => "red",
            "admins" => "blue"
        ];

    ?>
    <?php 
    
    foreach ($tables as $table_name => $table) {
        ?>
          <!-- NB: Achaque fois qu'on ajout une table dans le tableau $tables elle s'affichera automatiquement sur la page dashboard -->
          <!-- C'est pourquoi on utilise la boucle foreach -->
            <div class="col l4 m6 s12">
                    <div class="card">
                        <div class="card-content <?= getColor($table, $colors) ?> white-text">

                        <span class="card-title">
                           <!-- NB: $table_name fait refférence à "Pulications, Commentaires et Administrateurs et $table fait rfférence à posts, comments et admins" -->
                           <?= $table_name  ?>
                        </span>
                       <!-- On va creer dans le dossier functions da l'admin une fonction (dashboard.func.php) qui va tout simplement permettre de réccupérer le nombre d'entrées dans la table -->
                       <!-- On appel notre fonction qui a été crée dans le dossier fonctions de l'admin dans la variable $nbrInTable -->
                       <?php $nbrInTable = inTable($table); ?>

                       <!-- On affiche le nombre qui se trouve dans chaque table commençant par l'index 0 -->
                        <h4><?= $nbrInTable[0] ?></h4>

                        </div>
                    </div>
                </div>

        <?php
    }
    ?>
</div>

<h4>Commentaires non lus</h4>

<!-- On affiche les commentaires non lus dans un tableau -->
<!-- Nous allons créer une fonction dans dashboard.func.php afin de réccupérer le titre de l'article et les commentaires en bd -->
<?php
   //Stoquons cette fonction dans une variable
   $comments= get_comments();

?>
<table>
    <thead>
      <tr>
        <th>Article</th>
        <th>Commentaire</th>
        <th>Actions</th>
      </tr>
    </thead>

    <tbody>
     <?php
     
        //Je parcour le tbleau $comments avec la boucle foreach()
        foreach ($comments as $comment) {
        ?>
         <tr id="commentaire_<?= $comment->id ?>">

            <td><?= $comment->title ?></td>

            <!-- On utilise la fonction substr(debut, fin) pour réduire la taille d'un commentaire au cas ou l'utilisateur écrit un long commentaire -->
            <td><?= substr($comment->comment,0,100); ?>...</td>

            <td>
                <!-- On met <?= $comment->id ?> afin que ça soit spécifique à chaque article -->
                <a href="#" id="<?= $comment->id ?>" class="see_comment btn-floating btn-small waves-effect waves-light green">
                  <i class="material-icons">done</i>
                </a>

                <a href="#" id="<?= $comment->id ?>" class="delete_comment btn-floating btn-small waves-effect waves-light red">
                  <i class="material-icons">delete</i>
                </a>

                <a href="index.php?page=viewCompletComments&id=<?=$comment->id ?>" class="btn-floating btn-small waves-effect waves-light blue modal-trigger">
                  <i class="material-icons">more_vert</i>
                </a>   
            </td>
          </tr>
        <?php
        }
     ?>
     <!--Import jQuery before materialize.js-->
     <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
     <script src="js/dashboard.func.js"></script>
    </tbody>
</table>
<pre>
    <?php 
     var_dump($_SESSION);
    ?>
</pre>