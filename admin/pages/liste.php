<h2>Liste des articles</h2>
<hr>

<div class="row">
    <?php 
        // Créeons une variable post qui va être égale à notre fuction crée dan la page hom.func.php
        $posts = get_posts();

        //Je parcour les différents résultats
        foreach ($posts as $post) {
    ?>

     <div class="col s12">
        <div class="row">

          <h4>
            <?= $post->title ?>

              <!--Condition ternaire pour afficher le cadenat devant les titres de chaque article qui sont postés en privés -->
              <?php echo ($post->posted == "0") ? "<i class='material-icons'>lock</i>" : "" ?>
          </h4>

            <div class="col s12 m6 l8" style="text-align: justify;">
               <?=substr(nl2br($post->content),0,500) ?>...
            </div>

          <div class="col s12 m6 l4">
            <img src="../img/posts/<?= $post->image?>" class="materialboxed responsive-img" alt="<?= $post->title?>">
            <br><br>
            <a class="btn light-blue waves-effect waves-light" href="index.php?page=post&id=<?= $post->id?>">Lire l'article complet</a>
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
        /* From https://css.glass */
        background: rgba(255, 255, 255, 1);
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(5px);
        -webkit-backdrop-filter: blur(5px);
        border: 1px solid rgba(255, 255, 255, 0.3);
    }
   
</style>