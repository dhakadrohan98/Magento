<?php
/**
 * Created by PhpStorm.
 * User: sigma
 * Date: 24/8/22
 * Time: 12:59 PM
 */

namespace Dependency\Inject\NotMagento;


class BigPencil implements PencilInterface
{
    public function getPencilType()
    {
        return "Big Pencil";
    }
}