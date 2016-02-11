<?php
/**
* 
*/
class Order
{
	public $id;
	public $x;
	public $y;
	public $count;
	public $goods;
	function __construct($id)
	{
				$this->id = $id;
	}
}