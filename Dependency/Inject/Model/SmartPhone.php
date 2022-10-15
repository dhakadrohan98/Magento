<?php
/**
 * Created by PhpStorm.
 * User: sigma
 * Date: 26/8/22
 * Time: 11:59 AM
 */

namespace Dependency\Inject\Model;


use Dependency\Inject\Api\MobileInterface;

class SmartPhone implements MobileInterface
{

    public function getMobileType()
    {
        return "Smartphone";
    }
}