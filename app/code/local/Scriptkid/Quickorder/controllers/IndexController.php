<?php
class Scriptkid_Quickorder_IndexController extends Mage_Core_Controller_Front_Action
{
	public function indexAction($arguments)
	{
		$quote = Mage::getSingleton('checkout/session')->getQuote();
		
		$helper = Mage::helper('quickorder');
		$post = $this->getRequest()->getPost();
		$failures = false;
		$products = false;
		
		foreach($post['sku'] as $row => $sku)
		{
			if($sku =='')
			{

			} else if($p = $helper->checkProduct($sku))
			{
				$qty = $post['qty'][$row];
				$products[] = array('product' => $p, 'qty' => $qty);
			} else {
				$failures[] = $sku;
			}
		}

		$this->loadLayout();
		$block = $this->getLayout()->getBlock('quickorderForm');
		if(count($post) > 0)		
		{
			if($failures && count($failures) > 0)
			{
				$block->setFailures($failures);
				$block->setValues($post);
			
			} else {
				foreach($products as $p)
				{
					$quote->addProduct($p['product'], $p['qty']);
				}
				$quote->collectTotals()->save();
				$this->_redirect('checkout/cart');
			}
		}
		$this->renderLayout();
	}

}