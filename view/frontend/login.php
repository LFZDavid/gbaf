<?php

$title = "Connection";
ob_start();
?>

<form action="/gbaf/index.php?action=connect" method="post">
	<label for="username">Username</label>
	<input type="text" id="username" name="username"><br/>
	
	<label for="pwd">password</label>
	<input type="password" id="pwd" name="pwd"><br/>
	<input type="submit" name="Connection">

</form>
<a href="/gbaf/index.php?action=signup"><em>Inscription</em></a>

<?php $content = ob_get_clean(); ?>
<?php require ('view/frontend/template.php'); ?>