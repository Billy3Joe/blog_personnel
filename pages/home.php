<h1>Page d'accueil</h1>
<div class="row">
    <?php 
    // Créeons une variable post qui va être égale à notre fuction crée dan la page hom.func.php
    $posts = get_posts();

    //Je parcour les différents résultats
    foreach ($posts as $post) {
    ?>
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
                    <div class="card-image waves-effect waves-block waves-light">
                        <img src="img/posts/<?= $post->image ?>" alt="<?= $post->title ?>">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text textdarken-4">
                            <!-- Apparution des 3 points en dessous des posts -->
                            <i class="material-icons">
                                more_vert
                            </i>
                        </span>
                    </div>
                </h6>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
</div>