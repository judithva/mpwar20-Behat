<?php
declare(strict_types=1);

namespace LaSalle\ChupiProject\Module\Color\Domain;

use LaSalle\ChupiProject\Module\Color\Application\ColorBuilder;
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

        return (new ColorBuilder())->random($colors)->__toString();
    }
}
