<?php
declare(strict_types=1);

namespace LaSalle\ChupiProject\Module\Color\Application;



final class GetARandomColorResponse
{
    private $color;

    public function __construct(string $color)
    {
        $this->color = $color;
    }

    public function type() : string
    {
         return  $this->color;
    }
}