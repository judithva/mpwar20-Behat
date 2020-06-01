<?php
declare(strict_types=1);

namespace LaSalle\ChupiProject\Module\Color\Application;



final class RandomColorExcept
{
    private $except;
    private $getARandomColor;

    public function __construct(string $except, GetARandomColor $getARandomColor)
    {
        $this->except = $except;
        $this->getARandomColor = $getARandomColor;
    }

    public function __invoke(): string
    {
        $return = $this->except;

        while ($this->except === $return)
        {
            $return = $this->getARandomColor->__invoke()->type();
        }

        return $return;
    }
}