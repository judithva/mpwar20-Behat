<?php

declare(strict_types=1);

namespace LaSalle\ChupiProject\Module\Color\Domain;


final class Color
{
    private $color;

    public function __construct(string $color)
    {
        $this->color = $color;
    }

    public function getColor()
    {
        return $this->color;
    }
}