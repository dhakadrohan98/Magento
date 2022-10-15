<?php
/**
 * Created by PhpStorm.
 * User: sigma
 * Date: 26/8/22
 * Time: 4:44 PM
 */

namespace Dependency\Inject\Model;


use Dependency\Inject\Api\Category;

class Flour implements Category
{

    public function getCategory()
    {
        return "Flour";
    }
}