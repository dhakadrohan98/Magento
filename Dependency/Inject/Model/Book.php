<?php
/**
 * Created by PhpStorm.
 * User: sigma
 * Date: 24/8/22
 * Time: 5:21 PM
 */

namespace Dependency\Inject\Model;
use Dependency\Inject\Api\Color;
use Dependency\Inject\Api\Size;


class Book
{
    protected $color;
    protected $size;
    public function __construct(Color $color,Size $size)
    {
        $this->color = $color;
        $this->size = $size;
    }
}