<?php 
	class Animal 
	{ protected $name;
		protected $gender;
		protected $health;
		public function __construct($name, $gender, $health) 
		{ 
			$this->name = $name;
			$this->gender = $gender;
			$this->health = $health; 
		}
		public function getName()
		{
			return $this->name;
		}
		public function getGender()
		{
			return $this->gender;
		}
		public function getHealth()
		{
			return $this->health;
		}
		public function changeHealth($healthPoints)
		{
			$this->health = $this->health + $healthPoints;
		}
		public function doSpecialMove()
		{
			return 'walk';
		}
	}
?>