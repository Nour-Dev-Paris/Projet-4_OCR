<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <meta name="description" content="Découvrez une nouvelle manière de lire. Bienvenue sur le blog de Jean Forteroche. Découvrez sa nouvelle publication sur ce site web. Episode après épisode restez connecté afind d'avoir le fin mot de l'histoire."/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
        <link rel="stylesheet" href="public/css/style.css"/>
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <script type="text/javascript" src="https://platform.linkedin.com/badges/js/profile.js" async defer></script>
        <script     src='https://cdn.tiny.cloud/1/247moblfhxobzpb5lm5brakceov54y4pj7trrr1wc1dixliz/tinymce/5/tinymce.min.js' referrerpolicy="origin">
        </script>
        <script>
        tinymce.init({
          selector: '#mytextarea'
        });
        </script>
        <script src="public/js/script.js"></script>
    </head>
    
    <body>
        <?= $content ?>
        
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
    </body>
    <footer>
        <p><a href="https://abdenour-belkacemi-developpeur-web.com"/>© 2020 Abdenour Belkacemi - Développeur Web</a></p>
    </footer>
</html>