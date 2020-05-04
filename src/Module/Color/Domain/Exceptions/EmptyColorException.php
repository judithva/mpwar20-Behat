<?php


namespace Practica4\Module\Color\Domain\Exceptions;


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