<?php

declare(strict_types=1);

namespace LaSalle\ChupiProject\Module\CoolWord\Domain;


final class CoolWord
{
    private $coolWord;

    public function __construct(string $coolWord)
    {
        $this->coolWord = $coolWord;
    }

    public function getCoolWord()
    {
        return $this->coolWord;
    }
}