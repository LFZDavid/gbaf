<?php

abstract class Manager
{
	protected $db;
	protected $table;
	protected $classManaged;

	public function __construct()
	{
		try{
			$this->db = new \PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root' , '');
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch (PDOException $e){
			echo 'La connexion à échoué.<br/>';
			echo 'Information : [', $e->getCode(), '] ', $e->getMessage();
		}
	}

	public function getList()
	{
		$q = $this->db->query('SELECT * FROM '.$this->table);
		$q->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->classManaged);
		$list = $q->fetchAll();
		return $list;
	}

	public function getUniqueById($id)
	{
		$request = 'SELECT * FROM '.$this->table.' WHERE id =:id'; 
		$q = $this->db->prepare($request);
		$q->bindValue(':id', $id, PDO::PARAM_INT);
		$q->execute();
		$q->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->classManaged);
		return $q->fetch();
	}

	public function isExist($id)
	{
		$request = 'SELECT id FROM '.$this->table.' WHERE id = :id';
		$q = $this->db->prepare($request);
		$q->bindValue(':id',$id,PDO::PARAM_INT);
		$q->execute();
		$result = $q->fetch();

		return $result;
	}
}