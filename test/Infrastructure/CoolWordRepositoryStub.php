<?php
declare(strict_types=1);

namespace Practica4Test\Infrastructure;


use LaSalle\ChupiProject\Module\CoolWord\Domain\CoolWordRepository;

class CoolWordRepositoryStub implements CoolWordRepository
{
    public function all(): array
    {
        return ['Besiis'];
    }
}