<?php
declare(strict_types=1);

namespace Practica4Test\Infrastructure;


use LaSalle\ChupiProject\Module\Color\Domain\ColorRepository;


class ColorRepositoryValidSpy implements ColorRepository
{
    private $allWasCalled = false;

    public function all(): array
    {
        $this->allWasCalled = true;
        return ['red'];
    }

    public function allWasCalled(): bool
    {
        return $this->allWasCalled;
    }
}