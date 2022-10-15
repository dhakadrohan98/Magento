<?php
/**
 * Created by PhpStorm.
 * User: sigma
 * Date: 24/8/22
 * Time: 3:31 PM
 */

namespace Dependency\Inject\Model;
use Dependency\Inject\Api\Color;

class Green implements Color
{

    public function getColor()
    {
       return "Green";
    }
}

