<?php
/**
 * Created by PhpStorm.
 * User: sigma
 * Date: 24/8/22
 * Time: 3:24 PM
 */

namespace Dependency\Inject\Model;

use Dependency\Inject\Api\Size;

class Small implements Size
{

    public function getSize()
    {
        return "Small";
    }
}

