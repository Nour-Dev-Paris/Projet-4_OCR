<?php $title = "Le Blog de Jean Forteroche"; ?>

<?php ob_start(); ?>
    
    <section id='title_admin'>
        <div class="container admin_header">
            <div class="row">
                <div class="col-sm-6 col-md-8 col-lg-12">
                    <h1 class="text-center">Panneau d'administration</h1>
                </div>
            </div>  
        </div>
        <p class="return_admin"><a href="/index.php?action=adminView">Retour au menu</a></p>
    </section>

    <div class="listPanel">
        <p class="style_report report_ticket">Voulez-vous vraiment supprimer cet article : <?= $post['title']; ?> ? Cette action sera définitive ! </p>
        <a class="button_removePost delete_view" href="index.php?action=deletePost&amp;id=<?= $post['id']; ?>">Valider</a>
        <a  class="button_removePost delete_view" href="/index.php?action=adminView">Retour au menu</a>
    </div>



<?php $content = ob_get_clean(); ?>

<?php require('..\Projet4\view\frontend\template.php'); ?>