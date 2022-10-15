<?php
/**
 * Created by PhpStorm.
 * User: sigma
 * Date: 24/8/22
 * Time: 1:41 PM
 */

namespace Dependency\Inject\Model;
use Dependency\Inject\Api\Color;
use Dependency\Inject\Api\Size;


class Yellow implements Color
{

    public function getColor()
    {
        return "Yellow";
    }
}