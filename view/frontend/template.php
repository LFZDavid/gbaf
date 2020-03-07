<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="public/css/style.css" rel="stylesheet" /> 
    </head>
        
    <body>
    	<header>
    		<a href="index.php"><img src="public/img/logo-gbaf.png"/></a>
            <?= $user_lastname ?>
            <?= $user_firstname ?>
    	</header>
        <?= $content ?>
        <footer>
            |<a href="#"> Mentions légales </a>|<a href="#"> Contact </a>|            
        </footer>
    </body>
</html>