<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <title><?= $title ?></title>
        <link href="public/fontawesome-free-5.12.1-web/css/all.css" rel="stylesheet">
        <link href="/gbaf/public/css/style.css" rel="stylesheet" />
    </head>
        
    <body>
        <div id="main">
    	   <header>
                <div id="header-logo">
            		<a href="/gbaf/index.php"><img src="/gbaf/public/img/logo-gbaf.png" alt="logo-gbaf"/></a>
                </div>
                <?php
                    if(!empty($_SESSION['lastname']) && !empty($_SESSION['firstname'])){
                ?>
                <div id="header-user-infos">
                <?php
                        echo '<a href="/gbaf/index.php?view=profile"><i class="fas fa-user-circle fa-lg"></i></a>';
                        echo ' '.htmlspecialchars($_SESSION['lastname']).' ';
                        echo htmlspecialchars($_SESSION['firstname']);

                ?>
                </div>
                <a id="deco-btn" href="/gbaf/view/frontend/logout.php"><button class="btn btn-danger">Se déconnecter</button></a>
                    <?php
                    }
                    ?>
    	   </header>
           <div id="content">
                <?= $content ?>
                <a href="#header-logo" id="scrolltop" class="btn btn-secondary"><i class="fas fa-arrow-alt-circle-up"></i></a>
            </div>
            <footer>
            <div class="footer-content">
                |<a href="/gbaf/view/frontend/mentionsLegals.php"> Mentions légales </a>|<a href="/gbaf/view/frontend/contact.php"> Contact </a>|
            </div>            
            </footer>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="/gbaf/public/js/script.js"></script>
    </body>
</html>