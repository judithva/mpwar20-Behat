<?php
declare(strict_types=1);

namespace LaSalle\ChupiProject\Module\Phrase\Domain\Exceptions;


use DomainException;

class EmptyPhraseException extends DomainException
{
    public function __construct()
    {
        parent:: __construct($this->errorMessage());
    }

    public function errorMessage():string
    {
        return "The phrase array is empty.";
    }

}