<?php

session_start();

function autoload($classname)
{
  if (file_exists($file = __DIR__ . '/controller/' . $classname . '.php')){
    require $file;
  }
  elseif (file_exists($file = __DIR__ . '/model/' . $classname . '.php')){
    require $file;
   }
}

spl_autoload_register('autoload');