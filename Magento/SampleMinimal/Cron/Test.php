<?php

namespace Magento\SampleMinimal\Cron;

use Magento\Catalog\Model\ProductRepository;
use Magento\SampleMinimal\Block\OnSaleProduct;

class Test
{
    protected $productRepository;
    protected $onSaleProduct;

    public function __construct(ProductRepository $productRepository, OnSaleProduct $onSaleProduct)
    {
        $this->productRepository = $productRepository;
        $this->onSaleProduct = $onSaleProduct;
    }

    public function execute()
    {
        $collection = $this->onSaleProduct->getProductCollection();
        foreach ($this->onSaleProduct->getProductCollection() as $product) {
            echo '<pre>';
            //print_r($product->getSpecialPrice()); 	// this code for getSpecialPrice for products
            $array = $product->getData(); // this line get all getSpecialPrice products collection
            $data = ($array['sku']);
            $addname = $this->productRepository->get($data);
            $addname->setName("ON SALE >>>" . $addname->getName());
            $this->productRepository->save($addname);
        }
    }
}