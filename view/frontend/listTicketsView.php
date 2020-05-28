<?php $title = "Le Blog de Jean Forteroche"; ?>

<?php ob_start(); ?>

    <div class="container home_header text-center">
        <div class="heading col-sm-4 col-md-6 col-lg-6">
            <h1>Billet Simple pour l'Alaska</h1>
            <h2>Jean Forteroche</h2>
            <p>Une nouvelle manière de lire</p>
        </div>
            
        <div class="col-sm-4 col-md-6 col-lg-6 block">
            <p class="p-info title_co">Connexion administrateur</p>
            <form action="/index.php?action=loginAdmin" method="post" class="form">
                <div class="form-group has-error">
                    <label for="identifiant">Identifiant</label>
                    <input type="text" name="identifiant" id="identifiant" class="form-control"/><br>
                </div> 
                <div class="form-group has-error">
                    <label for="pass">Mot de passe</label>
                    <input type="password" name="pass" id="pass" class="form-control"/><br>
                </div>
                <div class="form-group">
                    <input type="submit" value="Connexion" class="btn btn-primary"/>
                </div>
            </form>
        </div>
    </div>

<?php

    $listPostView = new FrontendController();
    $posts = $listPostView->listPosts();

    while ($data = $posts->fetch())
{
?>

    <div class="container">
        <div class="row">
            <div class="news text-center col-sm-12 col-md-8">
                <div class="title_post_admin">
                    <h3 class="title_chap">
                        <?= htmlspecialchars($data['title']) ?>
                    </h3>
                    <em class="date_em">le <?= $data['creation_date_fr'] ?></em>
                    <div class="text_admin">
                        <p class="text_content_admin">
                            <?= ($data['content']) ?><br />
                            <em class="com_em"><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
                        </p>
                    </div>
                </div>    
            </div>
        </div>
    </div>

<?php
}   
    $posts->closeCursor();
?>

<?php $content = ob_get_clean(); ?>

<?php require('..\Projet4\view\frontend\template.php'); ?>