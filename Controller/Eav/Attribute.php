<?php  

class Controller_Eav_Attribute extends Controller_Core_Action
{
	public function gridAction()
	{
		
		$grid = new Block_Eav_Attribute_Grid();
		$layout = $this->getLayout();
		$layout->getChild('content')->addChild('grid',$grid);
		$layout->render();
	}

	public function addAction()
	{
		$attribute = Ccc::getModel('Eav_Attribute');
		if(!$attribute){
			throw new Exception("Invalid Id.", 1);
		}
		$options = Ccc::getModel('Eav_Attribute_Option')->getCollection();

		$add = new Block_Eav_Attribute_Edit();
		$layout = $this->getLayout();
		$add->setData(['attribute'=>$attribute,'options'=>$options]);
		$layout->getChild('content')->addChild('add',$add);
		$layout->render();
	}

	public function editAction()
	{
		if(!$id = (int) $this->getRequest()->getParams('id')){
    		throw new Exception("Invalid request.", 1);
		}
		$attribute = Ccc::getModel('Eav_Attribute')->load($id);

		$sql = "SELECT * FROM `eav_attribute_option` WHERE `attribute_id` = '{$id}'";
		$options = Ccc::getModel('Eav_Attribute_Option')->fetchAll($sql);

		
		$edit = new Block_Eav_Attribute_Edit();
		$edit->setData(['attribute'=>$attribute,'options'=>$options]);
		$this->getLayout()->getChild('content')->addChild('edit',$edit);
		$this->getLayout()->render();
	}

	public function saveAction()
	{
		if(!$this->getRequest()->isPost()){
				throw new Exception("Invalid request.", 1);
			}

			$postData = $this->getRequest()->getPost('attribute');
			if(!$postData){
				throw new Exception("Invalid data posted.", 1);
			}

			if($id = (int) $this->getRequest()->getParams('id')){
				$attribute = Ccc::getModel('Eav_Attribute')->load($id);
				if(!$attribute){
					throw new Exception("Invalid Id.", 1);
				}
			}
			else
			{
				$attribute = Ccc::getModel('Eav_Attribute');
			}

			$attribute->setData($postData);
			if(!$attribute->save()){
				throw new Exception("Unable to save attribute.", 1);
			}

			$attributeId = $attribute->attribute_id;
			$postOptions = $this->getRequest()->getPost('option');
			if(!$postOptions){
				throw new Exception("Invalid data posted.", 1);
			}

			if(array_key_exists('exist', $postOptions)){
				$sql = "SELECT * FROM `eav_attribute_option` WHERE `attribute_id` = '{$id}'";
				$attributeOption = Ccc::getModel('Eav_Attribute_Option')->fetchAll($sql);
				if($attributeOption){
					foreach ($attributeOption->getData() as $row) {
						if(!array_key_exists($row->option_id, $postOptions['exist'])){
							$row->setData(['option_id'=>$row->option_id]);
							$row->delete();
						}
					}
				}
			}
			foreach ($postOptions as $key => $value) {
				if($key == 'new'){
					foreach ($value as $value1) {
						if($value1){
							$option = Ccc::getModel('Eav_Attribute_Option');
							$option->setData(['name'=>$value1]);
							$option->addData('attribute_id',$attributeId);
							if(!$option->save()){
								throw new Exception("Unable to save option.", 1);
							}
						}
					}
				}
				else{
					foreach ($value as $key => $value1) {
						if($value1){
							$option = Ccc::getModel('Eav_Attribute_Option')
								->load($key);
							$option->setData(['name'=>$value1]);
							if(!$option->save()){
								throw new Exception("Unable to save option.", 1);
							}
						}
					}
				}
			}

		$this->redirect('grid','eav_attribute',null,true);
	}

	public function deleteAction()
	{
		$id = $this->getRequest()->getParams("id");
		$attribute = Ccc::getModel('Eav_attribute')->load($id);
		$attribute->delete();

		$this->redirect('grid','eav_attribute',null,true);

	}

	
}

?>