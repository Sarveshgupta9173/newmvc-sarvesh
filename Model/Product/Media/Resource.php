<?php

class Model_Product_Media_Resource extends Model_Core_Table_Resource
{
	 public function __construct()
    {
        parent::__construct();
        $this->setTableName('media')->setPrimaryKey('media_id');
    }

}

?>