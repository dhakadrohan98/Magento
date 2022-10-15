<?php

namespace Dependency\Inject\Controller\Page;

use Dependency\Inject\Api\MobileInterface;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Dependency\Inject\Api\PencilInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Event\ManagerInterface;


class HelloWorld extends \Magento\Framework\App\Action\Action
{
    protected $pencilInterface;
    protected $productRepository;
    protected $_eventManager;

    function __construct(Context $context,
                         ManagerInterface $_eventManager,
                         ProductRepositoryInterface $productRepository)
    {
//        $this->pencilInterface = $pencilInterface;
        $this->productRepository = $productRepository;
//        $this->mobileInterface = $mobileInterface;
        $this->_eventManager = $_eventManager;
        parent::__construct($context);
    }

    /**
     * Execute action based on request and return result
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {

        $message = new \Magento\Framework\DataObject(array("greeting"=>"Good Morning"));
        $this->_eventManager->dispatch('custom_event',['greeting'=>$message]);
        echo $message->getGreeting();
//        echo $this->pencilInterface->getPencilType();
//        echo get_class($this->productRepository);

//         $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
//        $pencil = $objectManager->create(type:'Dependency\Inject\Model\Pencil');
//        var_dump($pencil);

//        $book = $objectManager->create(type:'Dependency\Inject\Model\Book');
//        var_dump($book);

//        $student = $objectManager->create(type: 'Dependency\Inject\Model\Student');
//        var_dump($student);

//        echo $this->mobileInterface->getMobileType();

//        $grocery = $objectManager->create(type:'Dependency\Inject\Model\Grocery');
//       var_dump($grocery);

//         $eventModel = $objectManager->create(type: 'Dependency\Inject\Model\EventModel');
//         $eventModel->getIncrementId();


    }
}
