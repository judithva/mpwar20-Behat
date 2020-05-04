<?php

namespace Practica4\Module\Color\Domain;

use mysql_xdevapi\Exception;
use Practica4\Module\Color\Domain\Exceptions\EmptyColorException;

final class RandomColorSearcher
{
    private $repository;

    public function __construct(ColorRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(): string
    {
        $colors = $this->repository->all();

        if(empty($color))
        {
            throw new EmptyColorException();
        }

        return $colors[mt_rand(0, count($colors) - 1)];
    }
}
