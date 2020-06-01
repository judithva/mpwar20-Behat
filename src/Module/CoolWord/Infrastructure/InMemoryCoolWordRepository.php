<?php
declare(strict_types=1);

namespace LaSalle\ChupiProject\Module\CoolWord\Infrastructure;

use LaSalle\ChupiProject\Module\CoolWord\Domain\CoolWord;
use LaSalle\ChupiProject\Module\CoolWord\Domain\CoolWordRepository;

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
            'Besiis'
        ];
    }

    public function get(array $coolWords): CoolWord
    {
        return new CoolWord($coolWords[mt_rand(0, count($coolWords) - 1)]);
    }
}
