<?php 

class Model_Product extends Model_Core_Table
{
	 public function __construct()
    {
        parent::__construct();
        $this->setResourceClass('Model_Product_Resource');
    }
}

?>