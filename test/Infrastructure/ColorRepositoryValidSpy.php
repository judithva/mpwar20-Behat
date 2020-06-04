<?php
declare(strict_types=1);

namespace Practica4Test\Infrastructure;


use Colors\Color;
use LaSalle\ChupiProject\Module\Color\Domain\ColorRepository;


class ColorRepositoryValidSpy implements ColorRepository
{
    private $allWasCalled = false;
    private $getWasCalled = false;

    public function all(): array
    {
        $this->allWasCalled = true;
        return ['red'];
    }

    public function allWasCalled(): bool
    {
        return $this->allWasCalled;
    }

    public function get(array $colors): Color
    {
        $this->getWasCalled = true;
        return new Color('red');
    }

    public function getWasCalled(): bool
    {
        return $this->getWasCalled;
    }
}