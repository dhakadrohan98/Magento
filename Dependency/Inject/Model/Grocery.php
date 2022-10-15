<?php
/**
 * Created by PhpStorm.
 * User: sigma
 * Date: 26/8/22
 * Time: 4:40 PM
 */

namespace Dependency\Inject\Model;

use Dependency\Inject\Api\Color;
use Dependency\Inject\Api\Price;
use Dependency\Inject\Api\Category;


class Grocery
{
    protected $price;
    protected $category;
    protected $color;

    public function __construct(Price $price, Category $category,
                                Color $color)
    {
        $this->category = $category;
        $this->price = $price;
        $this->color = $color;
    }

    public function getGroceryType()
    {
        return "Grocery type is ".$this->category->getCategory().", color is ".
        $this->color->getColor()." and price is ".$this->price->getPrice();
    }
}