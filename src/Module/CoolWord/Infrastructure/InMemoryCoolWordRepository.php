<?php

namespace Practica4\Module\CoolWord\Infrastructure;

use Practica4\Module\CoolWord\Domain\CoolWordRepository;

final class InMemoryCoolWordRepository implements CoolWordRepository
{
    public function all(): array
    {
        return [
            'Chachi pistachi!',
            'Esto mola mogollón, tío!',
            'Mola mazo!',
            'Eres mazo guay',
            'Holiiiiii',
            'Besiis',
        ];
    }
}
