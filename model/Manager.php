<?php

abstract class Manager{

	protected $db;

	public function __construct(){
		
		try{
			$this->db = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root' , '');
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch (PDOException $e){
			echo 'La connexion à échoué.<br/>';
			echo 'Information : [', $e->getCode(), '] ', $e->getMessage();
		}

	}
}