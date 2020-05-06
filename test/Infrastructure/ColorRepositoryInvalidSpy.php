<?php
declare(strict_types=1);

namespace Practica4Test\Infrastructure;


use LaSalle\ChupiProject\Module\Color\Domain\ColorRepository;
use LaSalle\ChupiProject\Module\Color\Domain\Exceptions\EmptyColorException;


class ColorRepositoryInvalidSpy implements ColorRepository
{
    private $allWasCalled = false;

    public function all(): array
    {
        throw new EmptyColorException();
    }

    public function allWasCalled(): bool
    {
        return $this->allWasCalled;
    }
}