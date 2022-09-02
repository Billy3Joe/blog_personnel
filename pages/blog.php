<h1>Blog</h1>
<div class="row">
    <?php 
        // Créeons une variable post qui va être égale à notre fuction crée dan la page hom.func.php
        $posts = get_posts();

        //Je parcour les différents résultats
        foreach ($posts as $post) {
    ?>

     <div class="row">
        <div class="col l6 s12 m12 l12">

          <h4><?= $post->title ?></h4>

            <div class="row col s12 m6 l6" style="text-align: justify;">
               <?=substr(nl2br($post->content),0,500) ?>...
            </div>

          <div class="row col s12 m6 l4">
            <img src="img/posts/<?= $post->image?>" class="materialboxed responsive-img" alt="<?= $post->title?>">
            <br><br>
            <a class="btn light-blue waves-effect waves-light" href="index.php?page=post&id=<?= $post->id?>">Lire l'article complet</a>
          </div>

        </div>
     </div>
    <?php
    }
    ?>
</div>