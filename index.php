
 <?php 
   include 'functions/main-function.php';
    //Je scanne le contenu du dossier pages
    $pages = scandir('pages/');
    //Je verifie si la page est presente et n'est pas vide
    if (isset($_GET['page']) && !empty($_GET['page'])) {

       if (in_array($_GET['page'].'.php', $pages)) {
        //Dans le cas ou la page se trouve dans le dossier pages, elle renvoit la page vers l'URL
        $page = $_GET['page'];

       }else {
        //Sinon elle renvoit la page erreur ie que la page n'existe pas dans le dossier pages
        $page='error';
       }

    }else {
        $page='home';
    }

   //POUR LES PAGES DU DOSSIER FUNCTIONS
   //Je scanne le contenu du dossier functions
    $pages_functions = scandir('functions/');
     //Je verifie si la page est presente et n'est pas vide
     if (in_array($page.'.func.php',$pages_functions)) {
       include 'functions/'.$page.'.func.php';
     }
 ?>
 <!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
        <?php include 'body/topbar.php' ?>

        <div class="container">
            <!-- J'appel tous les pages incluent dans le dossier page -->
            <?php include 'pages/'.$page.'.php'; ?>
        </div>
      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="js/materialize.js"></script>
    </body>
  </html>
