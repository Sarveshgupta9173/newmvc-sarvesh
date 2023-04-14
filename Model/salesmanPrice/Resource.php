<?php

class Model_salesmanPrice_Resource extends Model_Core_Table_Resource
{
	 public function __construct()
    {
        parent::__construct();
        $this->setTableName('salesman_price')->setPrimaryKey('sales_id');
    }
}

?>