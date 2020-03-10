<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
        <title><?= $title ?></title>
        <link href="public/css/style.css" rel="stylesheet" />
    </head>
        
    <body>
    	<header>
            <div class="container-fluid">
                <div id="header-logo">
            		<a href="index.php"><img src="public/img/logo-gbaf.png"/></a>
                </div>
                <div id="header-user-infos">
                    <?php
                    if(!empty($_SESSION['lastname']) && !empty($_SESSION['firstname'])){
                        echo $_SESSION['lastname'].' ';
                        echo $_SESSION['firstname'];
                    ?>
                        <a href="/gbaf/view/frontend/logout.php"><button>Déconnexion</button></a>
                    <?php
                    }
                    ?>
                </div>
            </div>
    	</header>
        <?= $content ?>
        <footer>
            |<a href="#"> Mentions légales </a>|<a href="#"> Contact </a>|            
        </footer>
    </body>
</html>