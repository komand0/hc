<?php 
/**
* 
*/
class Drone 
{
	public $id;
	public $x;
	public $y;
	public $weight;
	public $goods; 
	
	

	function __construct($id)
	{
		$this->id = $id;
	}
}
