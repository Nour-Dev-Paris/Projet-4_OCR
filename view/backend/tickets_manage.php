<?php $title = "Le Blog de Jean Forteroche"; ?>

<?php ob_start(); ?>
    
    <?php

    $listPostView = new FrontendController();
    $posts = $listPostView->listPosts();
    $countPost = 0;
    while ($data = $posts->fetch())
    {
    ?>
        <div class="listPanel">
				<p><a class="linkAdmin" href="index.php?action=updatePostView&amp;id=<?= $data['id']; ?>"><?= $data['title']; ?></a></p>
				<button class="removePost">Effacer</button>
					<div id="postModal<?= $countPost ?>" class="modal">
						<div class="modalContent">
							<p>Voulez-vous vraiment supprimer l'article <em><?= $data['title']; ?></em> ?</p>
							<a class="confirmDelete" href="index.php?action=deletePost&amp;id=<?= $data['id']; ?>">Oui</a>
							<span id="closePostModal<?= $countPost++ ?>" class="closeModal">Non</span>
						</div>
					</div>
				<a class="report" href="index.php?action=updatePost&amp;id=<?= $data['id']; ?>"><i class="fas fa-edit"></i></a>
				<p><em><?= $data['creation_date_fr']; ?></em></p>
    <?php
    }
    $posts->closeCursor();
    ?>

<?php $content = ob_get_clean(); ?>

<?php require('..\Projet4\view\frontend\template.php'); ?>