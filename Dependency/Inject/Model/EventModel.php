<?php
/**
 * Created by PhpStorm.
 * User: sigma
 * Date: 29/8/22
 * Time: 10:56 AM
 */

namespace Dependency\Inject\Model;

use Magento\Framework\Event\ManagerInterface;
use Magento\Sales\Model\EntityInterface;

class EventModel implements EntityInterface
{
    protected $_eventManager;

    /**
     * @return string
     */
    public function getIncrementId()
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $_eventManager = $objectManager->create(type: 'Magento\Framework\Event\ManagerInterface');
        $_eventManager->dispatch('my_custom_event');
    }
}