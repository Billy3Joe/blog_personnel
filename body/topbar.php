<nav class="navbarUsers">
    <div class="container">
        <div class="nav-wrapper">
           
            <div class="logo">
                <a href="index.php?page=home" class="brand-logo">
                    <img src="img/logo.png" alt="Mon logo" height="65px" width="70px">
                </a>

                <!-- <a href="#"data-activates="mobile-menu" class="button-collapse">
                    <i class="material icons">menu</i>
                </a> -->
            </div>
           
            <div class="menu">
                <ul class="right">
                    <!-- Cest une condition ternaire en php permettant de rendre les liens des pages active lorsqu'on clique dessus -->
                    <li class="<?php echo ($page=="home")?"active" : ""; ?>"><a href="index.php?page=home">Accueil</a></li>
                    <li class="<?php echo ($page=="blog")?"active" : ""; ?>"><a href="index.php?page=blog"><a href="index.php?page=blog">Blog</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<style>
    .navbarUsers{
        background-color: #ED9B01;
        }
</style>