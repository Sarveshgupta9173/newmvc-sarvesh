<?php 

class Model_Media extends Model_Core_Table
{
    public function __construct()
    {
        parent::__construct();
        $this->setResourceClass('Model_Media_Resource');
    }
    
}

?>