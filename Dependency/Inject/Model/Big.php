<?php
/**
 * Created by PhpStorm.
 * User: sigma
 * Date: 24/8/22
 * Time: 3:27 PM
 */

namespace Dependency\Inject\Model;

use Dependency\Inject\Api\Size;

class Big implements Size
{

    public function getSize()
    {
        return "Big";
    }
}