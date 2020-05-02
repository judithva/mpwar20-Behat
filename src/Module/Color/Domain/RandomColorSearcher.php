<?php

namespace Practica4\Module\Color\Domain;

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

        return $colors[mt_rand(0, count($colors) - 1)];
    }
}
