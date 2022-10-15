<?php
/**
 * Created by PhpStorm.
 * User: sigma
 * Date: 26/8/22
 * Time: 4:45 PM
 */

namespace Dependency\Inject\Model;


use Dependency\Inject\Api\Price;

class Hundered implements Price
{

    public function getPrice()
    {
        return "100rs";
    }
}