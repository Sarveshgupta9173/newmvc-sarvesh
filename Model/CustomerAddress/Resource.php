<?php

class Model_CustomerAddress_Resource extends Model_Core_Table_Resource
{
	 public function __construct()
    {
        parent::__construct();
        $this->setTableName('customer_address')->setPrimaryKey('customer_id');
    }

}

?>