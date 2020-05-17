<?php $title = "Le Blog de Jean Forteroche"; ?>

<?php ob_start(); ?>
    
    <section id='title_admin'>
        <div class="container admin_header">
            <div class="row">
                <div class="col-sm-6 col-md-8 col-lg-12">
                    <h1 class="text-center">Modification des billets</h1>
                </div>
                <p class="return_admin"><a href="/index.php?action=adminView">Retour au menu</a></p>
            </div>  
        </div>
    </section>

<?php

    $listPostView = new FrontendController();
    $posts = $listPostView->listPosts();
    while ($data = $posts->fetch())
{
?>
        <div class="listPanel">
            <p>
                <a class="link_update" href="index.php?action=updatePostView&amp;id=<?= $data['id']; ?>"><?= $data['title']; ?></a>
            </p>
            <p>
                <a class="button_removePost" href="index.php?action=deletePost&amp;id=<?= $data['id']; ?>">Effacer</a>
            </p><br>
            
            <p>
                <a class="button_removePost delete_post" href="index.php?action=updatePostView&amp;id=<?= $data['id']; ?>">Mettre à jour</a>
            </p>
            <p><em><?= $data['creation_date_fr']; ?></em></p>
        </div>
<?php
}
    $posts->closeCursor();
?>

<?php $content = ob_get_clean(); ?>

<?php require('..\Projet4\view\frontend\template.php'); ?>