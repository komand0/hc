<?php
/**
* 
*/
class Warehouse
{
	public $id;
	public $x;
	public $y;
	public $goods;


	function __construct($id)
	{
		$this->id=$id;
	}
}