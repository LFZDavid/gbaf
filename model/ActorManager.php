<?php
namespace App\Model\Manager;

use \App\Model\Manager\Manager;
use \App\Model\Entity\Actor;


class ActorManager extends Manager
{
	protected $table = 'actors';
	protected $classManaged = '\App\Model\Entity\Actor';
}