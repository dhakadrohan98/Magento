<?php
namespace Magetop\Helloworld\Block\Adminhtml\Posts\Edit\Tab;

use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Widget\Tab\TabInterface;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\Registry;
use Magento\Framework\Data\FormFactory;
use Magento\Cms\Model\Wysiwyg\Config;
use Magetop\Helloworld\Model\System\Config\Status;

class Info extends Generic implements TabInterface
{
    /**
     * @var \Magento\Cms\Model\Wysiwyg\Config
     */
    protected $_wysiwygConfig;

    /**
     * @var \Magetop\Helloworld\Model\System\Config\Status
     */
    protected $_status;
    /**
     * @param Context $context
     * @param Registry $registry
     * @param FormFactory $formFactory
     * @param Config $wysiwygConfig
     * @param Status $status
     * @param array $data
     */
    public function __construct(
        Context $context,
        Registry $registry,
        FormFactory $formFactory,
        Config $wysiwygConfig,
        Status $status,
        array $data = []
    ) {
        $this->_wysiwygConfig = $wysiwygConfig;
        $this->_status = $status;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * Prepare form fields
     *
     * @return \Magento\Backend\Block\Widget\Form
     */
    protected function _prepareForm()
    {
//        /* @var $model \Magetop\Helloworld\Model\PostsFactory /
        $model = $this->_coreRegistry->registry('magetop_blog');

//        /* @var \Magento\Framework\Data\Form $form /
        $form = $this->_formFactory->create();
        $form->setHtmlIdPrefix('post_');
        $form->setFieldNameSuffix('post');
        // new filed

        $fieldset = $form->addFieldset(
        'base_fieldset',
        ['legend' => __('General')]
        );

        if ($model->getId()) {
        $fieldset->addField(
        'id',
        'hidden',
        ['name' => 'id']
        );
        }
        $fieldset->addField(
        'title',
        'text',
        [
        'name'      => 'title',
        'label'     => __('Title'),
        'title' => __('Title'),
        'required' => true
        ]
        );

        $fieldset->addField(
        'image1',
        'image',
        [
        'name' => 'image',
        'label' => __('Image'),
        'note' => 'Allow image type: jpg, jpeg, png',
        'required'=>true
        ]
        );

        $fieldset->addField(
        'image',
        'text',
        array(
        'name' => 'image'
        )
        );

        $fieldset->addField(
        'status',
        'select',
        [
        'name'      => 'status',
        'label'     => __('Status'),
        'options'   => $this->_status->toOptionArray(),
        'required' => true
        ]
        );
        $fieldset->addField('description', 'textarea', [
        'name'      => 'description',
        'label'   => 'Description',
        'config'    => $this->_wysiwygConfig->getConfig(),
        'wysiwyg'   => true,
        'required'  => true
        ]);

        // Start Date
        $fieldset->addField(
            'start_date',
            'date',
            [
                'name' => 'start_date',
                'label' => __('Start Date'),
                'title' => __('Start Date'),
                'required' => true,
                'class' => '3',
                'singleClick'=> true,
                'date_format' => 'yyyy-MM-dd',
                'time_format' => 'hh:mm:ss',
                'time'=>true
                //'format' =>$this->_localeDate->getDateFormat(\IntlDateFormatter::LONG)
            ]
        );

        // End Date field
        $fieldset->addField(
            'end_date',
            'date',
            [
                'name' => 'end_date',
                'label' => __('End Date'),
                'title' => __('End Date'),
                'required' => true,
                'class' => '3',
                'singleClick'=> true,
                'date_format' => 'yyyy-MM-dd',
                'time_format' => 'hh:mm:ss',
                'time'=>true
                //'format' =>$this->_localeDate->getDateFormat(\IntlDateFormatter::LONG)
            ]
        );

        $data = $model->getData();
        $form->setValues($data);
        $this->setForm($form);

        return parent::_prepareForm();

        }
        /**
         * Prepare label for tab
         *
         * @return string
         */
        public function getTabLabel()
    {
        return __('Banner Info');
    }

        /**
         * Prepare title for tab
         *
         * @return string
         */
        public function getTabTitle()
    {
        return __('Banner Info');
    }

        /**
         * {@inheritdoc}
         */
        public function canShowTab()
    {
        return true;
    }

        /**
         * {@inheritdoc}
         */
        public function isHidden()
    {
        return false;
    }
    }