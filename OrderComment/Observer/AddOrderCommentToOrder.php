<?php
namespace Codilar\OrderComment\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

/**
 * Class AddOrderCommentToOrder
 * @package Codilar\OrderComment\Observer\Order
 */
class AddOrderCommentToOrder implements ObserverInterface
{

    /**
     * @param Observer $observer
     * @throws \Exception
     */
    public function execute(Observer $observer)
    {
        $_order = $observer->getEvent()->getOrder();
        $_order->addStatusToHistory($_order->getStatus(),'Test the order comment message ',false);
        $_order->save();
    }
}
