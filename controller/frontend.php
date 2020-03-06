<?php

require ('model/autoload.php');
require ('controller/Actor.php');
require ('controller/User.php');
require ('controller/Comment.php');
require ('controller/Vote.php');

function listActors(){
	$actorManager = new ActorManager();
	$actors = $actorManager->getList();
	require('view/frontend/listActorView.php');
}