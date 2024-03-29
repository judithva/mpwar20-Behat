<?php
declare(strict_types=1);

namespace Practica4Test\Infrastructure;


use LaSalle\ChupiProject\Module\CoolWord\Domain\CoolWord;
use LaSalle\ChupiProject\Module\CoolWord\Domain\Exceptions\EmptyCoolWordException;
use LaSalle\ChupiProject\Module\CoolWord\Domain\CoolWordRepository;

class CoolWordRepositoryInvalidSpy implements CoolWordRepository
{
    private $allWasCalled = false;
    private $getWasCalled = false;

    public function all(): array
    {
        Throw new EmptyCoolWordException();
    }

    public function allWasCalled(): bool
    {
        return $this->allWasCalled;
    }

    public function get(array $coolWords): CoolWord
    {
        throw new EmptyCoolWordException();
    }

    public function getWasCalled(): bool
    {
        return $this->getWasCalled;
    }
}