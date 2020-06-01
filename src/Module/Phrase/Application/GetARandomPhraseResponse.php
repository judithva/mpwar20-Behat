<?php
declare(strict_types=1);

namespace LaSalle\ChupiProject\Module\Phrase\Application;



final class GetARandomPhraseResponse
{
    private $phrase;

    public function __construct(array $phrase)
    {
      $this->phrase = $phrase;
    }

    public function type() : array
    {
         return  $this->phrase;
    }
}