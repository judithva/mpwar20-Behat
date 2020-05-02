<?php

namespace Practica4\Module\Color\Infrastructure;

use Practica4\Module\Color\Domain\ColorRepository;

final class InMemoryColorRepository implements ColorRepository
{
    public function all(): array
    {
        return ['red', 'cyan', 'magenta', 'green', 'black', 'yellow', 'blue', 'light_gray'];
    }
}
