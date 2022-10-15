<?php
namespace Cron\Sale\Cron;

use Magento\Catalog\Model\ProductRepository as CollectionFactory;
class Sale {

    protected $collectionFactory;
    public function __construct(CollectionFactory $collectionFactory)
    {
        $this->CollectionFactory=$collectionFactory;
    }
    /**     
     * @return void
     */
    public function execute() {

        $collection=$this->CollectionFactory->getById(6);
        $name=$collection->getName();

        $array=explode(" ",$name);
//        $collection->setName("Cycle");
//        $this->CollectionFactory->save($collection);

        //checkin if ON Sale already apended to this product
        if(!($array[0]=="On"&&$array[1]=="sale++")){
            $collection->setName("On sale++ ".$name);
            $price=$collection->getPrice();
            $collection->setPrice($price/0.25);
            $this->CollectionFactory->save($collection);
        }
        else
        return "Product is already ON Sale";
    }
}