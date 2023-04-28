<?php 

class Model_Core_Pager
{
	public $totalRecords = 0;
	public $currentPage = 0;
	public $numberOfPages = 0;
	public $start = 0;
	public $previous = 0;
	public $next = 0;
	public $recordPerPage = 10;
	public $end = 0;
	public $startLimit = 0;
	public $recordPerPageOptions = [10,20,50,100,200];

	public function __construct()
	{
		$this->setCurrentPage();		
	}

	public function setCurrentPage()
	{
		$this->currentPage = (int)Ccc::getModel('Core_Request')->getParams('p',1);
		return $this;
	}
	public function getCurrentPage()
	{
		return $this->currentPage;
	}

	public function setTotalRecords($totalRecords)
	{
		$this->totalRecords = $totalRecords;
		return $this;
	}

	public function getTotalRecords()
	{
		return	$this->totalRecords;
	}

	public function getRecordPerPage()
	{
		return $this->recordPerPage;
	}

	public function setNumberOfPages($numberOfPages)
	{
		$this->numberOfPages = $numberOfPages;
		return $this;
	}

	public function getNumberOfPages()
	{
		return $this->numberOfPages;
	}

	public function setRecordPerPage($rpp)
	{
		$this->recordPerPage = $rpp;
		return $this;
	}

	public function calculate()
	{
		// // calculate no of pages
		$numberOfPages = ceil($this->getTotalRecords()/$this->recordPerPage);
		$this->numberOfPages = $numberOfPages;
		
		if($this->numberOfPages == 0){
			$this->currentPage = 0;
		}
		if($this->numberOfPages == 1 || ($this->numberOfPages > 1 && $this->currentPage <= 0)) {
			$this->currentPage = 1;
		}
		if($this->currentPage > $this->numberOfPages){
			$this->currentPage = $this->numberOfPages;
		}


		// // calculate start
		$this->start = 1;
		if(!$this->numberOfPages){
			$this->start = 0;
		}
		if($this->currentPage == 1){
			$this->start = 0;
		}
		
		//end
		$this->end = $this->numberOfPages;
		if($this->currentPage == $this->numberOfPages){
			$this->end = 0;
		}

		// //calculate previous
		$this->previous = ($this->getCurrentPage())-1;
		if(($this->getCurrentPage()) <= 1){
			$this->previous = 0;
		}
		

		// // //calculate next
		$this->next = ($this->getCurrentPage())+1;
		if($this->currentPage >= $this->numberOfPages){
			$this->next = 0;
		}

		// //startLimit
		$this->startLimit = (($this->getCurrentPage()-1)*($this->recordPerPage));
	}

}

?>