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

    <div class="listPanel">
        <p class="style_report">Merci d'avoir signalé ce commentaire : </p>
            
        <p class="style_report_view">
            Auteur : <?= $getReportView['author']; ?>
        </p>
        <p class="style_report_view">
            Commentaire : <?= $getReportView['comment']; ?>
        </p>
        <p class="style_report">
            Il sera traité par le modérateur du site !
        </p>
    </div>
    
    <a  class="home_page text-center" href="/index.php?action=homePage">Retour à la page d'accueil</a>

<?php $content = ob_get_clean(); ?>

<?php require('..\Projet4\view\frontend\template.php'); ?>