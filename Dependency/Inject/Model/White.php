<?php
/**
 * Created by PhpStorm.
 * User: sigma
 * Date: 26/8/22
 * Time: 4:46 PM
 */

namespace Dependency\Inject\Model;


use Dependency\Inject\Api\Color;

class White implements Color
{

    public function getColor()
    {
        return "White";
    }
}