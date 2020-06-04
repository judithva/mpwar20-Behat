<?php
declare(strict_types=1);

namespace Practica4Test\Infrastructure;


use Colors\Color;
use LaSalle\ChupiProject\Module\Color\Domain\ColorRepository;

class ColorRepositoryStub implements ColorRepository
{
    public function all(): array
    {
        return ['red'];
    }

    public function get(array $colors): Color
    {
        return new Color('red');
    }
}