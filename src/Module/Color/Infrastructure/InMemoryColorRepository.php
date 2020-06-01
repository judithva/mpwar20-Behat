<?php
declare(strict_types=1);

namespace LaSalle\ChupiProject\Module\Color\Infrastructure;

use Colors\Color;
use LaSalle\ChupiProject\Module\Color\Domain\ColorRepository;

final class InMemoryColorRepository implements ColorRepository
{
    public function all(): array
    {
        return ['red', 'cyan', 'magenta', 'green', 'black', 'yellow', 'blue', 'light_gray'];
    }

    public function get(array $colors): Color
    {
        return new Color($colors[mt_rand(0, count($colors) - 1)]);
    }
}
