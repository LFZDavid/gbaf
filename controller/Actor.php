<?php

class Actor{

	protected $id;
	protected $name;
	protected $description;
	protected $logo;

	public function __construct($data = []){
		if (!empty($data)){
			$this->hydrate($data);
		}
	}

	public function hydrate($data){
		foreach($data as $attribut => $value){
			$method = 'set'.ucfirst($attribut);

			if(is_callable([$this, $method])){
				$this->$method($value);
			}
		}
	}

	//GETTERS
	public function id(){
		return $this->id;
	}
	public function name(){
		return $this->name;
	}
	public function description(){
		return $this->description;
	}
	public function logo(){
		return $this->logo;
	}

	//SETTERS
	public function setId($id){
		$id = (int) $id;
		if ($id >= 0){
			$this->id =$id;
		}
	}

	public function setName($name){
		$this->name = $name;
	}

	public function setDescription($description){
		$this->description = $description;
	}

	public function setLogo($logo){
		$this->logo = $logo;
	}
}