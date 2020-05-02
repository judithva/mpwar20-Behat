<?php
declare(strict_types=1);

namespace Practica4\Module\Color\Application;


use Practica4\Module\Color\Domain\RandomColorSearcher;

final class RandomColorExcept
{
    private $except;
    private $randomColorSeacher;

    public function __construct(string $except, RandomColorSearcher $randomColorSearcher)
    {
        $this->except = $except;
        $this->randomColorSeacher = $randomColorSearcher;
    }

    public function __invoke(): string
    {
        $return = $this->except;

        while ($this->except === $return)
        {
            $return = $this->randomColorSeacher->__invoke();
        }

        return $return;
    }
}