<?php

class Scriptkid_Quickorder_Block_Form extends Mage_Catalog_Block_Product_Abstract
{
	public function _prepareLayout()
	{
		return parent::_prepareLayout();
	}

	public function getTitle()
	{	
		#$title = Mage::getStoreConfig('catalog/bought/title');
		$title = 'Formular';
		return $title;
	}	

	public function getFormAction()
	{
		$action = '/quickorder/index/index';
		return $action;
	}

	public function getRowCount()
	{
		return 8;
	}
	
}
?>