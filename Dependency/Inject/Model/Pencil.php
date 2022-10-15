<?php
/**
 * Created by PhpStorm.
 * User: sigma
 * Date: 24/8/22
 * Time: 1:03 PM
 */

namespace Dependency\Inject\Model;

use Dependency\Inject\Api\PencilInterface;
use Dependency\Inject\Api\Color;
use Dependency\Inject\Api\Size;

class Pencil implements PencilInterface
{
    protected $color;
    protected $size;

    public function __construct(Color $color, Size $size)
    {
        $this->color = $color;
        $this->size = $size;
    }

    public function getPencilType()
    {
        return "Pencil has ".$this->color->getColor()." color and ".$this->size->getSize()." size". "\n";
    }
}