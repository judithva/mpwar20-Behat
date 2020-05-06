<?php
declare(strict_types=1);

namespace LaSalle\ChupiProject\Module\Color\Domain\Exceptions;


use DomainException;

class EmptyColorException extends DomainException
{
    public function __construct()
    {
        parent:: __construct($this->errorMessage());
    }

    public function errorMessage():string
    {
        return "The color array is empty.";
    }

}