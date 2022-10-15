<?php

namespace Dependency\Inject\NotMagento;

class YellowPencil implements PencilInterface {

    public function getPencilType()
    {
        return "Yellow Pencil";
    }
}