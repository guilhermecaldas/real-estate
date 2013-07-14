<?php
include_once("dao.class.php");

class ReservaDao extends Dao{
	
	public function __construct(){
		parent::__construct("reserva");
	}
	
	public function insert($fields, $values){
		try{
			return parent::insert($fields, $values);
		}
		catch(Exception $ex){
			throw($ex);
		}
	
	}
	
	public function find($columns,$filter)
	{
		if (parent::find($columns,$filter) > 0)
		{
			return parent::getRecordSet();
		}
		else
			return NULL;
	}					   
	
}
?>