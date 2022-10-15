<?php

namespace MageCheck\Tutorial\Plugin;

class Cart
{
    public function beforeAddProduct(
        \Magento\Checkout\Model\Cart $subject,
        $productInfo,
        $requestInfo
    ) {
        $requestInfo['qty'] = 10; // increasing quantity to 10
        return array($productInfo, $requestInfo);
    }
}