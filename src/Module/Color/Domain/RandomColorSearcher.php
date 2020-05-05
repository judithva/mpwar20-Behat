<?php

namespace LaSalle\ChupiProject\Module\Color\Domain;

use LaSalle\ChupiProject\Module\Color\Domain\Exceptions\EmptyColorException;

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

        if(empty($colors))
        {
            throw new EmptyColorException();
        }

        return $colors[mt_rand(0, count($colors) - 1)];
    }
}
