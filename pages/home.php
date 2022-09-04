<h1>Page d'accueil</h1>
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
                        <h5 class="grey-text text-darken-2">
                            <!-- Affichage du titre -->
                            <?= $post->title; ?>
                        </h5>
                        
                        <h6>
                            <div class="grey-text">
                                le <?= date("d/m/y à H:i", strtotime($post->date)); ?> par <?= $post->name ?>
                            </div>
                        </h6>

                        <div class="card-image waves-effect waves-block waves-light">
                            <img src="img/posts/<?= $post->image ?>" class="activator" alt="">
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
                            <p><a href="index.php?page=post&id=<?=$post->id ?>"target=_blank>Voir l'article complet</a></p>
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