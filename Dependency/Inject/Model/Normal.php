<?php
/**
 * Created by PhpStorm.
 * User: sigma
 * Date: 24/8/22
 * Time: 3:29 PM
 */

namespace Dependency\Inject\Model;
use Dependency\Inject\Api\Size;

class Normal implements Size
{

    public function getSize()
    {
        return "Normal";
    }
}