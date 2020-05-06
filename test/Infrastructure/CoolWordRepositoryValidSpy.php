<?php
declare(strict_types=1);

namespace Practica4Test\Infrastructure;


use LaSalle\ChupiProject\Module\CoolWord\Domain\CoolWordRepository;

class CoolWordRepositoryValidSpy implements CoolWordRepository
{
    private $allWasCalled = false;

    public function all(): array
    {
        $this->allWasCalled = true;
        return ['Holiiiiii'];
    }

    public function allWasCalled(): bool
    {
        return $this->allWasCalled;
    }
}