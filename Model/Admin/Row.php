<?php 

require_once 'Model/Core/Table/Row.php';


class Model_Admin_Row extends Model_Core_Table_Row
{
	protected $tableClass = 'Model_Admin';

	public function getStatus()
	{
		if($this->status){
			return $this->status;
		}
		return Model_Admin::STATUS_DEFAULT;
	}
}

?>