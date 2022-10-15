<?php

namespace Dependency\Inject\NotMagento;

class RedPencil implements PencilInterface {

    public function getPencilType()
    {
        return "Mine is Red Pencil";
    }
}