<?php
namespace Dependency\Inject\Observer;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;


/**
 * Created by PhpStorm.
 * User: sigma
 * Date: 26/8/22
 * Time: 6:41 PM
 */
class myObserver implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        echo "Hello, This is my observer";
    }
}

