<?php 

require_once 'Model/Core/Table.php';

class Model_Admin extends Model_Core_Table
{
	protected $tableName = null;
	protected $primaryKey = null;
	protected $tableClass = 'Model_Admin';
	const STATUS_ACTIVE = 1;
	const STATUS_ACTIVE_LBL = 'Active';
	const STATUS_INACTIVE = 2;
	const STATUS_INACTIVE_LBL = 'Inactive';
	const STATUS_DEFAULT = 2;

	public function setTableName($tableName)
	{
		$this->tableName = $tableName;
		return $this;
	}

	public function getTableName()
	{
		if($this->tableName){
			return $this->tableName;
		}
		$tableName = 'admin';
		$this->setTableName($tableName);
		return $tableName;
	}

	public function setPrimaryKey($primaryKey)
	{
		$this->primaryKey = $primaryKey;
		return $this;
	}

	public function getPrimaryKey()
	{
		if($this->primaryKey){
			return $this->primaryKey;
		}
		$primaryKey = 'admin_id';
		$this->setPrimaryKey($primaryKey);
		return $primaryKey;
	}

	public function getStatusOptions(){
		return [
			self::STATUS_ACTIVE => self::STATUS_ACTIVE_LBL,
			self::STATUS_INACTIVE => self::STATUS_INACTIVE_LBL
		];
	}
}



?>