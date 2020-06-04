<?php
declare(strict_types=1);

namespace Practica4Test\Infrastructure;


use LaSalle\ChupiProject\Module\CoolWord\Domain\CoolWord;
use LaSalle\ChupiProject\Module\CoolWord\Domain\CoolWordRepository;

class CoolWordRepositoryValidSpy implements CoolWordRepository
{
    private $allWasCalled = false;
    private $getWasCalled = false;

    public function all(): array
    {
        $this->allWasCalled = true;
        return ['Holiiiiii'];
    }

    public function allWasCalled(): bool
    {
        return $this->allWasCalled;
    }

    public function get(array $coolWords): CoolWord
    {
        $this->getWasCalled = true;
        return new CoolWord('Holiiiiii');
    }

    public function getWasCalled(): bool
    {
        return $this->getWasCalled;
    }
}