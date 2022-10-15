<?php
namespace Magetop\Helloworld\Block\Adminhtml;

use Magento\Backend\Block\Widget\Grid\Container;

class Posts extends Container
{
    protected function _construct()
    {
        $this->_controller = 'adminhtml_posts';
        $this->_blockGroup = 'Magetop_Helloworld';
        $this->_headerText = __('Banner');
        $this->_addButtonLabel = __('Add Banner');
        parent::_construct();
    }
}