<h2 style="color:orange;">Dashboard des commentaires complets</h2>

<div class="viewCompletCommenatires">

    <?php
      //Stoquons cette fonction dans une variable
      $comments= get_comments();

    ?>
        <h4 style="color:red;">Commentaires non lus</h4>

        <?php 
          //Je parcour le tbleau $comments avec la boucle foreach()
          foreach ($comments as $comment) {

            ?>

            <div>
            <div class="modal-content">
                    <h4><?= $comment->title ?></h4>
                    <p>Commentaire posté par
                    <strong><?= $comment->name . " (" . $comment->email . ")</strong><br/>Le " . date("d/m/Y à H:i", strtotime($comment->date)) ?>
                    </p>

                    <hr/>
                    <p><?= nl2br($comment->comment) ?></p>

                </div>

                <div class="modal-footer">
                    <a href="#" id="<?= $comment->id ?>" class="delete_comment modal-action modal-close waves-effect waves-light waves-red btn-flat">
                      <i class="material-icons">delete</i>
                    </a>

                    <a href="#" id="<?= $comment->id ?>" class="see_comment modal-action modal-close waves-effect waves-light waves-green btn-flat">
                      <i class="material-icons">done</i>
                    </a>
                </div>
              <!--Import jQuery before materialize.js-->
              <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
              <script src="js/viewCompletComments.func.js"></script>
              
            </div>

            <?php
          }
        ?>

</div>

<style>
  .viewCompletCommenatires{
      padding: 10px;
      /* From https://css.glass */
      background: rgba(255, 255, 255, 1);
      box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
      backdrop-filter: blur(5px);
      -webkit-backdrop-filter: blur(5px);
      border: 1px solid rgba(255, 255, 255, 0.3);
  }
</style>

