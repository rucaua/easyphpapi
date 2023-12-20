<?php

namespace app\lib\core\interfaces;

interface EntityFilterInterface
{
    /**
     *
     * @return EntityFilterInterface[]
     */
    public function getFilters():array;
}