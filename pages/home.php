<!-- Début de la recherche -->
    <?php 
       @$keywords=$_GET["keywords"];
       @$valider=$_GET["valider"];

       if (isset($valider) && !empty(trim($keywords))) {
        $words=explode(" ", trim($keywords));
        
        $res =$db->prepare("SELECT content FROM posts WHERE content LIKE '%$keywords%'");
        $res->setFetchMode(PDO::FETCH_ASSOC);
        $res->execute();
        $tab=$res->fetchAll();
        $afficher="oui";
       }
    
    ?>

<form action="" method="GET">
    <input type="text" name="keywords"placeholder="<?= $keywords ?>">
    <input style="display: flex; justify-content: center" type="submit" name="valider" value="Rechercher" class="btn orange waves-effect waves-light">
    
    <?php 
    if (@$afficher=="oui") {
      ?>
        <div id="resultats">
            <div id="nbr">
                <?= count($tab)." ".(count($tab)>1?"résultats trouvés":"résultat trouvé")?>
            </div>
            <hr>
            <ol>
                <?php 
                
                for ($i=0; $i < count($tab); $i++) { 
              ?>
                   <li><?= $tab[$i]["content"]?></li>
              <?php
                }
                ?>
            </ol>
        </div>
      <?php  
    }
    
    ?>
   
</form>
<!-- Fin de la recherche -->

<h1 class="h1"> Articles recents</h1>
<div class="#">
    <?php 
        // Créeons une variable post qui va être égale à notre fuction crée dan la page hom.func.php
        $posts = get_posts();

        //Je parcour les différents résultats
        foreach ($posts as $post) {
    ?>
        <div class="row">
            <div class="col l6 m6 s12">
                <div class="card">
                    <div class="card-content">
                            <h5 class="grey-text text-darken-1">
                                <!-- Affichage du titre -->
                                <?= $post->title; ?>
                            </h5>
                            
                            <h6>
                                <div class="grey-text">
                                    le <?= date("d/m/y à H:i", strtotime($post->date)); ?> par <?= $post->name ?>
                                </div>
                            </h6>

                            <div class="card-image waves-effect waves-block waves-light">
                                <img src="img/posts/<?= $post->image ?>" class="activator" alt="" height="300px" width="50px">
                            </div>

                            <!-- J'affiche l'apperçu de l'article en utilisant la fonction substr(bebut, fin); -->
                            <p style="text-align: justify;"><?= substr(nl2br($post->content),0,100); ?>...</p>

                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">
                                    <!-- Apparution des 3 points en dessous des posts -->
                                    <i class="material-icons right">
                                        more_vert
                                    </i>
                                </span>
                                <p>
                                    <a style="color:#ED9B01;" href="index.php?page=post&id=<?=$post->id ?>">
                                       Voir l'article complet
                                    </a>
                                </p>
                            </div>

                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">
                                    <?= $post->title ?>
                                    <i class="material-icons right">
                                        close
                                    </i>
                                </span>
                            </div>

                    </div>
                </div>
            </div>
    <?php
    }
    ?>
</div>

<style>
    .row{
        padding: 10px;
    }
    .card{
        padding: 10px;
        /* From https://css.glass */
        background: rgba(255, 255, 255, 1);
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(5px);
        -webkit-backdrop-filter: blur(5px);
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .h1{
        text-align: center;
        color: #ED9B01;
    }

</style>