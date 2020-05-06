<?php

namespace LaSalle\ChupiProject\Module\CoolWord\Infrastructure;

use LaSalle\ChupiProject\Module\CoolWord\Domain\CoolWordRepository;
use LaSalle\ChupiProject\Module\CoolWord\Domain\Model\ValueObject\CoolWordValueObject;

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

        //$coolWordValueObject = new CoolWordValueObject();
        //return $coolWordValueObject::generate();
        //return $coolWordValueObject->all();
        //return $coolWordValueObject::$coolWord;
    }
}
