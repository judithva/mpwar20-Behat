<?php
declare(strict_types=1);

namespace Practica4Test\Infrastructure;


use Colors\Color;
use LaSalle\ChupiProject\Module\Color\Domain\ColorRepository;
use LaSalle\ChupiProject\Module\Color\Domain\Exceptions\EmptyColorException;


class ColorRepositoryInvalidSpy implements ColorRepository
{
    private $allWasCalled = false;
    private $getWasCalled = false;

    public function all(): array
    {
        throw new EmptyColorException();
    }

    public function allWasCalled(): bool
    {
        return $this->allWasCalled;
    }

    public function get(array $colors): Color
    {
        throw new EmptyColorException();
    }

    public function getWasCalled(): bool
    {
        return $this->getWasCalled;
    }
}