<?php 

class Model_CustomerAddress extends Model_Core_Table
{
     public function __construct()
    {
        parent::__construct();
        $this->setResourceClass('Model_CustomerAddress_Resource');
    }
}

?>