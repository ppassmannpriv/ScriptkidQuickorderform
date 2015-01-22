<?php

class Graphodata_Quickorder_Helper_Data extends Mage_Core_Helper_Abstract {

	public function checkProduct($sku)
	{
		$p = Mage::getModel('catalog/product')->loadByAttribute('sku', $sku);
		
		if($p && $p->getId())
		{	
			$p = Mage::getModel('catalog/product')->load($p->getId());
			return $p;
		} else {
			return false;
		}
	}

}