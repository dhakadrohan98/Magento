<?php
namespace Mageplaza\HelloWorld\Controller\Index;
use Mageplaza\HelloWorld\Helper\Data;
class Test extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;
    protected $data;
    public function __construct(Data $data,
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory)
    {
        $this->data=$data;
        $this->_pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        echo $this->data->getStoreConfig();
        echo "Hello World";
        exit;
    }
}