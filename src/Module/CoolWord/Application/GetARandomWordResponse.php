<?php
declare(strict_types=1);

namespace LaSalle\ChupiProject\Module\CoolWord\Application;



final class GetARandomWordResponse
{
    private $word;

    public function __construct(string $word)
    {
        $this->word = $word;
    }

    public function type() : string
    {
         return  $this->word;
    }
}