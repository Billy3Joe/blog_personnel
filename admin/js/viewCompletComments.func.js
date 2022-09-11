 // CODE DE VALIDATION DES COMMENTAIRES SUR LE BOUTTON JUSTE IE MARQUE COMME VU
 $(document).ready(function() {
     //Vérifions que l'utilisateur a cliqué sur le bouton vu (juste)
     $(".see_comment").click(function() {
         //Définissons une variable qui va être celle de l'id du commentaire
         var id = $(this).attr("id");
         //Validons le commentaire
         $.post('ajax/see_comment.php', { id: id }, function() {

             //Après que le commentaire soit éffacé dépuis la page see_comment.php, nous allons cacher le commentaire afin de ne pas toujours actualiser la page
             $("#commentaire_" + id).hide();
             //NB:Nous avons pris #commentaire_ sur la page dashboard.php au niveau de la balise <tr></tr> et nous avons ajouté l'id du commentaire en question faisant refférence à <?= $comment->id ?> colé à "#commentaire_" ie id="commentaire_<?= $comment->id ?>"

         });

     });
 });



 // CODE DE SUPPRESSION DES COMMENTAIRES SUR LE BOUTTON CORBEILLE ROUGE
 $(document).ready(function() {
     //Vérifions que l'utilisateur a cliqué sur le bouton vu (juste)
     $(".delete_comment").click(function() {
         //Définissons une variable qui va être celle de l'id du commentaire
         var id = $(this).attr("id");
         //Validons le commentaire
         $.post('ajax/delete_comment.php', { id: id }, function() {

             //Après que le commentaire soit éffacé dépuis la page see_comment.php, nous allons caher le commentaire afin de ne pas toujours actualiser la page
             $("#commentaire_" + id).hide();
             //NB:Nous avons pris #commentaire_ sur la page dashboard.php au niveau de la balise <tr></tr> et nous avons ajouté l'id du commentaire en question faisant refférence à <?= $comment->id ?> colé à "#commentaire_" ie id="commentaire_<?= $comment->id ?>"

         });

     });
 });