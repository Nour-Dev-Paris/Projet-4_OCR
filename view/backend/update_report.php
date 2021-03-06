<?php $title = "Modification des articles"; ?>

<?php ob_start();?>
    
    <section id='title_admin'>
        <div class="container admin_header">
            <div class="row">
                <div class="col-sm-6 col-md-8 col-lg-12">
                    <h1 class="text-center">Panneau d'administration</h1>
                </div>
            </div>  
        </div>
    </section>
    
    <h1>Modification des commentaires</h1>
    <div id="post_admin text-center">
        <p class="return_admin"><a href="/index.php?action=adminView">Retour au menu</a></p>
        <div id="updateBlock">
            <form action="index.php?action=updateReport&amp;id=<?= $getReportView['id']; ?>" method="post">
                <label for="title">Titre : </label>
                <input type="text" name="title" id="title" value="<?= $getReportView['author'];?>" /><br/>
                <textarea id="mytextarea" name="content" rows="40" cols="160"><?= nl2br($getReportView['comment']);?></textarea>
                <input type="submit" value="Poster" />
            </form>
        </div>
    </div>

<?php $content = ob_get_clean(); ?>

<?php require('..\Projet4\view\frontend\template.php'); ?>