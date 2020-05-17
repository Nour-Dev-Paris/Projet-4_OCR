<?php $title = "Le Blog de Jean Forteroche"; ?>

<?php ob_start(); ?>
    
    <section id='title_admin'>
        <div class="container admin_header">
            <div class="row">
                <div class="col-sm-6 col-md-8 col-lg-12">
                    <h1 class="text-center">Modération des commentaires</h1>
                </div>
                <p class="return_admin"><a href="/index.php?action=adminView">Retour au menu</a></p>
            </div>  
        </div>
    </section>

<?php

    $listCommentsView = new BackendController();
    $commentsView = $listCommentsView->getReports();
    while ($data = $commentsView->fetch())
{
?>

    <div class="listPanel">
        <p>
            <a class="link_update author_comment" href="index.php?action=commentManage&amp;id=<?= $data['id']; ?>">Pseudo : <br><?= $data['author']; ?></a>
        </p>
        <p>
            <a class="link_update comment" href="index.php?action=commentManage&amp;id=<?= $data['id']; ?>">Commentaire : <br><?= $data['comment']; ?></a>
        </p>
        <p class="date_comment"><em>Date : <?= $data['comment_date']; ?></em></p>
        <p>
            <a class="button_removePost" href="index.php?action=deleteComment&amp;id=<?= $data['id']; ?>">Effacer</a>
        </p><br>
        <p>
            <a class="button_removePost delete_post" href="index.php?action=commentManage&amp;id=<?= $data['id']; ?>">Mettre à jour</a>
        </p>
    </div>

<?php
}
    $commentsView->closeCursor();
?>

<?php $content = ob_get_clean(); ?>

<?php require('..\Projet4\view\frontend\template.php'); ?>