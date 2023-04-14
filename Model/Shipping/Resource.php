<?php

class Model_Shipping_Resource extends Model_Core_Table_Resource
{
	 public function __construct()
    {
        parent::__construct();
        $this->setTableName('shipping')->setPrimaryKey('shipping_id');
    }

}

?>