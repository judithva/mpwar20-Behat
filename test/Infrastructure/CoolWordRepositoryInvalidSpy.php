<?php
declare(strict_types=1);

namespace Practica4Test\Infrastructure;


use LaSalle\ChupiProject\Module\Color\Domain\Exceptions\EmptyCoolWordException;
use LaSalle\ChupiProject\Module\CoolWord\Domain\CoolWordRepository;

class CoolWordRepositoryInvalidSpy implements CoolWordRepository
{
    private $allWasCalled = false;

    public function all(): array
    {
        Throw new EmptyCoolWordException();
    }

    public function allWasCalled(): bool
    {
        return $this->allWasCalled;
    }
}