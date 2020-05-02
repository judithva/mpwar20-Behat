<?php
declare(strict_types=1);

namespace Practica4Test\Infrastructure;


use Practica4\Module\Color\Domain\ColorRepository;

class ColorRepositoryStub implements ColorRepository
{
    public function all(): array
    {
        return ['red'];
    }
}