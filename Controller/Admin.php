<?php 

class Controller_Admin extends Controller_Core_Action
{

	protected $adminData = [];
	protected $model = null;
	protected $tableClass = null;

	public function setTableClass(Model_Admin_Row $tableClass)
	{
		$this->tableClass = $tableClass;
		return $this;
	}

	public function getTableClass()
	{
		if($this->tableClass){
			return $this->tableClass;
		}
		$tableClass = new Model_Admin_Row();
		$this->setTableClass($tableClass);
		return $tableClass;
	}

	public function setModelRow(Model_Admin_Row $adminRow)
	{
		$this->model = $adminRow;
	}

	public function getModelRow()
	{
		if($this->model){
			return $this->model;
		}
		$modelRow = new Model_Admin_Row();
		$this->setModelRow($modelRow);
		return $modelRow;
	}

	public function setAdminData($adminData)
	{
		$this->adminData =$adminData;
		return $this;
	}

	public function getAdminData(){
		if($this->adminData){
			return $this->adminData;
		}
		return false;
	}

	public function addAction()
	{
		$this->getTemplate('Admin/add.phtml');
	}

	public function editAction()
	{
		$request = $this->getRequest();
		$id = $request->getParams("id");
		$sql = "SELECT * FROM `{$this->getTableClass()->getTableName()}` WHERE `{$this->getTableClass()->getPrimaryKey()}` = '{$id}'";
		$this->setAdminData($result);
		$this->getTemplate('Admin/edit.phtml');
	}

	public function gridAction(){
		
		$sql = "SELECT * FROM `admin` ORDER BY `admin_id` DESC";
		$adminTable = Ccc::getModel('Admin');
		$admins = $adminTable->fetchAll($sql);
		$this->setAdminData($admins);
		$this->getTemplate('Admin/grid.phtml');
	}

	public function saveAction()
	{
		

		try {
			$request = $this->getRequest();
			$message = new Model_Core_Message();

			$data = $request->getPost("admin");
			
			if($request->getParams("id")){     //update
			$this->getModelRow()->data = $data;
			$this->getModelRow()->save();

			$message->addMessage('Updated  successfully',Model_Core_Message::SUCCESS);

			}

			else{                             //insert
				$this->getModelRow()->data = $data;
				$this->getModelRow()->save();

				$message->addMessage('Inserted  successfully',Model_Core_Message::SUCCESS);

			}

		} catch (Exception $e) {
			$message->addMessage('Insert/Update not Success ',Model_Core_Message::FAILURE);
			
		}

		

		$this->redirect('grid','admin',null,true);
	}

	public function insertAction()
	{
		try {
			$request = $this->getRequest();
			$request->isPost();

			$adminData = $request->getPost('admin');
			$this->getModelRow()->products = $adminData;
			$id = $this->getModelRow()->admin_id;
			$this->getModelRow()->load($id);
			$this->getModelRow()->save();

			$this->redirect('grid','admin',null,true);

		} catch (Exception $e) {
			
		}
	}

	public function updateAction()
	{
		try {
			$request = $this->getRequest();
			$request->isPost();
			echo "<pre>";
			$adminData = $request->getPost('admin');
			$this->getModelRow()->products = $adminData;
			$this->getModelRow()->save();

			$this->redirect('grid','admin',null,true);

		} catch (Exception $e) {
			
		}
	}

	public function deleteAction()
	{
		try {
			$message = new Model_Core_Message();
			$request = $this->getRequest();
			$id = $request->getParams("id");
			$this->getModelRow()->load($id);
			$this->getModelRow()->delete();
							
			$message->addMessage('Deleted  successfully',Model_Core_Message::SUCCESS);

		} catch (Exception $e) {
			$message->addMessage('Not deleted ',Model_Core_Message::FAILURE);
			
		}
	
		$this->redirect('grid','admin',null,true);
	}
}

?>