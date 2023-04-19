<?php 

class Controller_Core_Front extends Controller_Core_Action
{
	public function init()
	{
		// require_once 'Controller/Product.php';
		// $product = new Controller_Product;      //Static Way of getting each module
		// $product->gridAction();

		$request = new Model_Core_Request();
		$action = $request->getActionName()."Action";
		$controller = ucwords($request->getControllerName());
		$file = str_replace('_','/',$controller);

		$ca = 'Controller_'.$controller;
		$commonobject = new $ca;
		if(!method_exists($commonobject, $action)){
			echo "Given method Doesn't exists in the file/class";
		}
		else{
		$commonobject->$action(); 
		}
	}
}

?>