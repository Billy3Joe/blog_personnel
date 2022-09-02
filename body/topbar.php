<nav class="light-blue">
    <div class="container">
        <div class="nav-wrapper">
            <a href="index.php?page=home" class="brand-logo">Blog 2.0</a>
            <ul class="right hide-on-med-and-down">
                <!-- Cest une condition ternaire en php permettant de rendre les liens des pages active lorsqu'on clique dessus -->
                <li class="<?php echo ($page=="home")?"active" : ""; ?>"><a href="index.php?page=home">Accueil</a></li>
                <li class="<?php echo ($page=="blog")?"active" : ""; ?>"><a href="index.php?page=blog"><a href="index.php?page=blog">Blog</a></li>
            </ul>
        </div>
    </div>
</nav>