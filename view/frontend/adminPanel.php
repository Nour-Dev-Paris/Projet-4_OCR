<?php $title = "Admin"; ?>

<?php ob_start(); ?>
    
    <section id='title_admin'>
        <div class="container admin_header">
            <div class="row">
                <div class="col-sm-6 col-md-8 col-lg-12">
                    <h1 class="text-center">Panneau d'administration</h1>
                    <h2 class="text-center"><?php echo'Bonjour ' . $_SESSION['identifiant']; ?></h2>
                    <p class="return_home"><a href="/index.php?action=homePage">Retour à la page d'accueil</a></p>
                </div>
            </div>  
        </div>
    </section>

    <section id="portfolio">
            <div class="container">
                <div class="white-divider"></div>
                <div class="heading">
                    <h3></h3>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <a class="thumbnail" href="/index.php?action=createPost">
                            <img src="public/images/img1.jpg" alt="#">
                            <h2 class="text-center">Ecrire un billet</h2>
                        </a>
                    </div>
                    <div class="col-sm-4">
                        <a class="thumbnail" href="/index.php?action=updateView">
                            <img src="public/images/img2.jpg" alt="#">
                            <h2 class="text-center">Gestion des billets</h2>
                        </a>
                    </div>
                    <div class="col-sm-4">
                        <a class="thumbnail" href="/index.php?action=commentManageView">
                            <img src="public/images/img12.jpg" alt="#">
                            <h2 class="text-center">Modération</h2>
                        </a>
                    </div>
                </div>
<!--
                <div class="row">
                    <div class="col-sm-6">
                        <a class="thumbnail" href="#">
                            <img src="public/images/img3.jpg" alt="#">
                            <h2 class="text-center">Modification des billets</h2>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <a class="thumbnail" href="#">
                            <img src="public/images/img5.jpg" alt="#">
                            <h2 class="text-center">Modération des commentaires</h2>
                        </a>
                    </div>
                </div>
-->
            </div>
        </section>

<?php $content = ob_get_clean(); ?>

<?php require('..\Projet4\view\frontend\template.php'); ?>