<?php

class Model_Payment_Resource extends Model_Core_Table_Resource
{
	 public function __construct()
    {
        parent::__construct();
        $this->setTableName('payments')->setPrimaryKey('payment_id');
    }

}

?>