<?php
namespace Magento\SampleMinimal\Block;

use Magento\Catalog\Api\CategoryRepositoryInterface;
use Magento\Catalog\Block\Product\Context;
use Magento\Framework\Data\Helper\PostHelper;
use Magento\Catalog\Model\Layer\Resolver;
use Magento\Framework\Url\Helper\Data;
use Magento\Catalog\Model\ResourceModel\Product\Collection;
use Magento\Framework\App\ResourceConnection;
class OnSaleProduct extends \Magento\Catalog\Block\Product\ListProduct
{
    protected $_collection;
    protected $categoryRepository;
    protected $_resource;

    public function __construct(Context $context,
                                PostHelper $postDataHelper,
                                Resolver $layerResolver,
                                CategoryRepositoryInterface $categoryRepository,
                                Data $urlHelper,
                                Collection $collection,
                                ResourceConnection $resource,
                                array $data = []
    )
    {
        $this->categoryRepository = $categoryRepository;
        $this->_collection = $collection;
        $this->_resource = $resource;
        parent::__construct($context, $postDataHelper, $layerResolver, $categoryRepository, $urlHelper, $data);
    }

    public function getproductcollection()
    {
        $count = 10;
        $category_id = $this->getCategoryById(0); // pass your category id
        $collection = clone $this->_collection;
        $collection->clear()->getSelect()->reset(\Magento\Framework\DB\Select::WHERE)->reset(\Magento\Framework\DB\Select::ORDER)->reset(\Magento\Framework\DB\Select::LIMIT_COUNT)->reset(\Magento\Framework\DB\Select::LIMIT_OFFSET)->reset(\Magento\Framework\DB\Select::GROUP);
        if (!$category_id)
        {
            $category_id = $this->_storeManager->getStore()->getRootCategoryId();
        }
        $categorycollection = $this->categoryRepository->get($category_id);
        $today_date = date('Y-m-d');
        if (isset($categorycollection) && $categorycollection)
        {
            $collection->addMinimalPrice()->addFinalPrice()->addTaxPercents()
                ->addAttributeToSelect('name')
                ->addAttributeToSelect('image')
                ->addAttributeToSelect('small_image')
                ->addAttributeToSelect('thumbnail')
                ->addAttributeToSelect('special_from_date')
                ->addAttributeToSelect('special_to_date')
                ->addAttributeToFilter('special_price', ['neq' => ''])
                ->addAttributeToFilter([
                    [
                        'attribute' => 'special_from_date',
                        'lteq' => date('Y-m-d G:i:s', strtotime($today_date)),
                        'date' => true,
                    ],
                    [
                        'attribute' => 'special_to_date',
                        'gteq' => date('Y-m-d G:i:s', strtotime($today_date)),
                        'date' => true,
                    ]
                ])
                ->addAttributeToFilter('is_saleable', 1, 'left');
        }
        else
        {
            $collection->addMinimalPrice()
                ->addFinalPrice()
                ->addTaxPercents()
                ->addAttributeToSelect('name')
                ->addAttributeToSelect('image')
                ->addAttributeToSelect('small_image')
                ->addAttributeToSelect('thumbnail')
                ->addAttributeToFilter('special_price', ['neq' => ''])
                ->addAttributeToSelect('special_from_date')
                ->addAttributeToSelect('special_to_date')
                ->addAttributeToFilter([
                    [
                        'attribute' => 'special_from_date',
                        'lteq' => date('Y-m-d G:i:s', strtotime($today_date)),
                        'date' => true,
                    ],
                    [
                        'attribute' => 'special_to_date',
                        'gteq' => date('Y-m-d G:i:s', strtotime($today_date)),
                        'date' => true,
                    ]
                ])
                ->addAttributeToFilter('is_saleable', 1, 'left');
        }
        $collection->getSelect()->limit($count);
        return $collection;
    }

    /**
     * Return unique ID(s) for each object in system
     *
     * @return string[]
     */
    public function getIdentities()
    {
        // TODO: Implement getIdentities() method.
    }
}