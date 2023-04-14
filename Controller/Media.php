<?php 

class Controller_Media extends Controller_Core_Action
{
	public function addAction(){
		$add = new Block_Media_Add();
		$layout = $this->getLayout();
		$layout->getChild('content')->addChild('add',$add);
		$layout->render();
	}

	public function gridAction(){
		$sql = "SELECT * FROM `media`";
		$medias = Ccc::getModel('Media')->fetchAll($sql);
		Ccc::register('medias',$medias);

		$grid = new Block_Media_Grid();
		$model = Ccc::getModel('Media');
		$layout = $this->getLayout();
		$layout->getChild('content')->addChild('grid',$grid);
		$layout->render();
	}

	public function viewAction(){
 
		$sql = "SELECT * FROM `media`";
		$result = Ccc::getModel('Media')->fetchAll($sql);
		Ccc::register('medias',$result);

		$view = new Block_Media_View();
		$layout = $this->getLayout();
		$layout->getChild('content')->addChild('view',$view);
		$layout->render();
	}

	public function insertAction(){

		if(isset($_POST['submit']) && ($_FILES['my_img'])){

	    $img_name = basename($_FILES['my_img']['name']);
	    $img_path = $_FILES['my_img']['full_path'];
	    $tmp_name = $_FILES['my_img']['tmp_name'];
	    $targetpath = 'C:/xampp/htdocs/newProject/View/Media/img_list/'.$img_name;

	    date_default_timezone_set("Asia/Kolkata");
	    $created_at = date("Y-m-d h:i:s");

	        if(move_uploaded_file($tmp_name,$targetpath )){

	            echo "uploaded successfully";
	            $id = $this->getRequest()->getParams("id");
	            $model = Ccc::getModel('Media');
	            $model->addData('img_url',$img_path)->addData('product_id',$id);
	            $model->save();
	        }
	        }else{
	            echo "error uploading file";
	        } 
		 
	        $this->redirect('grid','media',null,true); 
		}

	public function updateAction(){

		$adapter = new Model_Core_Adapter();

		$request = $this->getRequest();
		$base = $request->getPost('base');
		$thumb = $request->getPost('thumb');
		$small = $request->getPost('small');
		$gallery = $request->getPost('gallery');

		// Initially set base ,thumb ,small,gallery = 0

		$sql = "UPDATE `media` SET `base`= 0 ,`thumb`= 0 ,`small`= 0 ,`gallery`= 0 ";
		$adapter->update($sql);

		//update the selected ones to 1
		$sql = "UPDATE `media` SET `base`= 1 WHERE `media_id`= '{$base}' ";
		$adapter->update($sql);

		$sql = "UPDATE `media` SET `thumb`= 1 WHERE `media_id`= '{$thumb}' ";
		$adapter->update($sql);

		$sql = "UPDATE `media` SET `small`= 1 WHERE `media_id`= '{$small}' ";
		$adapter->update($sql);


		foreach($gallery as $key=>$value){
		$sql = "UPDATE `media` SET `gallery`= 1 WHERE `media_id`= '{$value}' ";
		$adapter->update($sql);

		}
	    $this->redirect('grid','media'); 
		
	}

	public function deleteAction(){
		$request = $this->getRequest();
		$id = $request->getParams("id");

		$model = Ccc::getModel('Media');
		$data = $model->load($id);
		$model->delete();

	    $this->redirect('grid','media',null,true); 
	}

}
?>