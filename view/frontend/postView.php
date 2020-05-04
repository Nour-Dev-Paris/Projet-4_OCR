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
<p class="return_home"><a href="/index.php?action=homePage">Retour à la page d'accueil</a></p>

<?php

//    $postView = new FrontendController();
//    $post = $postView->post();
//    var_dump($post);
//    exit;
?>
        <div class="news">
            <div class="title_post_admin">
                <h3 class="title_chap">
                    <?= htmlspecialchars($post['title']) ?>
                </h3>
                <div class="text_admin">
                    <p>
                        <?= ($post['content']) ?>
                    </p>
                </div>
            </div>    
        </div>

        <div class="comment">
            <h2 class="title_comment">Commentaires</h2>
            
            <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post" class="form">
                <div class="form_comment">
                    <label for="author">Auteur</label><br />
                    <input type="text" id="author" name="author" class="form-control"/>
                </div>
                <div class="form_comment">
                    <label for="comment">Commentaire</label><br />
                    <textarea id="comment" name="comment"  style=resize:none class="form-control"></textarea>
                    <input type="submit" class="btn btn-primary style_button"/>
                </div>
                
                    
                
            </form>
        </div>

<?php
    while ($comment = $comments->fetch())
{
?>
    <div class="comment_view">
        <p class="comment_style"><strong><?= htmlspecialchars($comment['author']) ?></strong><br> <em class="date_comment">le <?= $comment['comment_date_fr'] ?></em></p>
        <div class="line_style"></div>
        <p class="comment_style"><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
        <p class="signal_com"><a href="index.php?action=report&amp;id=<?= $comment['id'] ?>'&amp;comment_id=' . $post['id'] . '">Signaler</a></p>
    </div>
<?php
}
?>

<?php $content = ob_get_clean(); ?>

<?php require('..\Projet4\view\frontend\template.php'); ?>