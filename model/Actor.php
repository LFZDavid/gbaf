<?php

class Actor extends Entity
{

	protected $name;
	protected $description;
	protected $logo;

	//GETTERS
	public function name()
	{
		return $this->name;
	}
	public function description()
	{
		return $this->description;
	}
	public function logo()
	{
		return $this->logo;
	}

	//SETTERS
	public function setName($name)
	{
		$this->name = $name;
	}
	public function setDescription($description)
	{
		$this->description = $description;
	}
	public function setLogo($logo)
	{
		$this->logo = $logo;
	}
}