<?php

class Model_Quote_Resource extends Model_Core_Table_Resource
{
	 public function __construct()
    {
        parent::__construct();
        $this->setTableName('quote')->setPrimaryKey('order_id');
    }

}

?>