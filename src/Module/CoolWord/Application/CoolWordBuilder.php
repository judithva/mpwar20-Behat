<?php

declare(strict_types=1);

namespace LaSalle\ChupiProject\Module\CoolWord\Application;


use LaSalle\ChupiProject\Module\CoolWord\Domain\CoolWord;


final class CoolWordBuilder
{
    private $coolWordString;

    public function __toString(): string
    {
        return $this->coolWordString;
    }

    public function build(): CoolWord
    {
        return new CoolWord($this->coolWordString);
    }

    public function random(array $coolWordsArray): self
    {
        $this->coolWordString = $coolWordsArray[mt_rand(0, count($coolWordsArray) - 1)];
        return $this;
    }
}