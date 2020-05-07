<?php

declare(strict_types=1);


namespace LaSalle\ChupiProject\Module\Color\Application;

use Colors\Color;


final class ColorBuilder
{
    private $colorString;

    public function __toString(): string
    {
        return $this->colorString;
    }

    public function build(): Color
    {
        return new Color($this->colorString);
    }

    public function random(array $colorsArray): self
    {
        $this->colorString = $colorsArray[mt_rand(0, count($colorsArray) - 1)];
        return $this;
    }
}