<?php

session_start();

function gbaf_autoload ($classname)
{
	$classname = str_replace('App\Controller\\', '', $classname);
	$classname = str_replace('App\Model\Manager\\', '', $classname);
	$classname = str_replace('App\Model\Entity\\', '', $classname);

	if (file_exists($file = __DIR__ . '/Controller/' . $classname . '.php')){
    require $file;
  }
  elseif (file_exists($file = __DIR__ . '/Model/' . $classname . '.php')){
    require $file;
   }
}

spl_autoload_register('gbaf_autoload');


