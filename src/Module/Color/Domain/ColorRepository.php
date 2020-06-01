<?php
declare(strict_types=1);

namespace LaSalle\ChupiProject\Module\Color\Domain;

use Colors\Color;

interface  ColorRepository
{
    public function all(): array;

    public function get(array $colors): Color;
}
