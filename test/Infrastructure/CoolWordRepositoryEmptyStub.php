<?php
declare(strict_types=1);

namespace Practica4Test\Infrastructure;


use LaSalle\ChupiProject\Module\CoolWord\Domain\CoolWord;
use LaSalle\ChupiProject\Module\CoolWord\Domain\CoolWordRepository;

class CoolWordRepositoryEmptyStub implements CoolWordRepository
{
    public function all(): array
    {
        return [];
    }

    public function get(array $coolWords): CoolWord
    {
        return null;
    }
}