<?php 


class Model_salesmanPrice extends Model_Core_Table 
{
  public function __construct()
    {
        parent::__construct();
        $this->setResourceClass('Model_salesmanPrice_Resource');
    }
}



?>