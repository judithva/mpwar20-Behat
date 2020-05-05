<?php
declare(strict_types=1);

namespace Practica4Test\Infrastructure;


use LaSalle\ChupiProject\Module\Color\Domain\ColorRepository;

class ColorRepositoryDummy implements ColorRepository
{
    public function all(): array
    {
        return [];
    }
}