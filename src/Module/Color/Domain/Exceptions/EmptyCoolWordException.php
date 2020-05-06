<?php
declare(strict_types=1);

namespace LaSalle\ChupiProject\Module\Color\Domain\Exceptions;


use DomainException;

class EmptyCoolWordException extends DomainException
{
    public function __construct()
    {
        parent:: __construct($this->errorMessage());
    }

    public function errorMessage():string
    {
        return "The cool word array is empty.";
    }

}