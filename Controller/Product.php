<?php 

class Controller_Product extends Controller_Core_Action
{

	public function importAction()
	{
		$layout = $this->getLayout();
		$import = $layout->createBlock('Product_Import')->toHtml();
		echo json_encode(['html'=>$import,'element'=>'content-html']);
		@header('Content-Type:application/json');
	}

	public function uploadAction()
	{
		echo "<pre>";
		$upload = new Model_Core_File_Upload();
		$upload->setPath('product')->save('file');

		$csv = new Model_Core_File_Csv();
		$csv->setPath('product')->setFileName('product.csv')->read();
		print_r($csv->getRows());
		
		

	}

	public function indexAction()
	{
		$layout = $this->getLayout();
		$index = $layout->createBlock('Core_Layout')->setTemplate('core/index.phtml');
		$layout->getChild('content')->addChild('index',$index);
		echo $layout->toHtml();
	}

	public function addAction(){
		$products = Ccc::getModel('Product');
		Ccc::register('products',$products);

		$layout = $this->getLayout();
		$edit = $layout->createBlock('Product_Edit')->toHtml();
		echo json_encode(['html'=>$edit,'element'=>'content-html']);
		@header('Content-Type:application/json');
	}

	public function editAction(){

		$id = (int) $this->getRequest()->getParams("id");
		$products = Ccc::getModel('Product')->load($id);
		Ccc::register('products',$products);
		$edit = new Block_Product_Edit();
		$layout = $this->getLayout();
		$edit = $layout->createBlock('Product_Edit')->toHtml();
		echo json_encode(['html'=>$edit,'element'=>'content-html']);
		@header('Content-Type:application/json');
	}

	public function gridAction(){		
		
		$layout = $this->getLayout();
		$grid = $layout->createBlock('Product_Grid')->toHtml();
		echo json_encode(['html'=>$grid,'element'=>'content-html']);
		@header('Content-Type:application/json');
	
	}

	public function saveAction()
	{
		
		try {
			$request = $this->getRequest();
			$message = new Model_Core_Message();

			$data = $request->getPost("product");
			$product = Ccc::getModel('Product');                         			
			
			if($request->getParams("id")){  		   //update
			$product->data = $data;
			$product->save();

			$message->addMessage('Updated  successfully',Model_Core_Message::SUCCESS);

			}

			else{    
				$product->data = $data;					//insert
				$product->save();

				$message->addMessage('Inserted  successfully',Model_Core_Message::SUCCESS);
			}

		} catch (Exception $e) {
			$message->addMessage('Insert/Update not Success ',Model_Core_Message::FAILURE);
			
		}
		$layout = $this->getLayout();
		$grid = $layout->createBlock('Product_Grid')->toHtml();
		echo json_encode(['html'=>$grid,'element'=>'content-html']);
		@header('Content-Type:application/json');
	}

	public function deleteAction(){
		try {

			$message = Ccc::getModel('Core_Message');
			$request = $this->getRequest();
			$id = $request->getParams("id");
			$product = Ccc::getModel('Product');
			$product->load($id);
			$product->delete();

			$message->addMessage('Deleted  successfully',Model_Core_Message::SUCCESS);

		} catch (Exception $e) {
			
			$message->addMessage('Not deleted ',Model_Core_Message::FAILURE);
		}

		$layout = $this->getLayout();
		$grid = $layout->createBlock('Product_Grid')->toHtml();
		echo json_encode(['html'=>$grid,'element'=>'content-html']);
		@header('Content-Type:application/json');

	}
}

?>