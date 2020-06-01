<?php
declare(strict_types=1);

namespace LaSalle\ChupiProject\Module\Color\Application;


use LaSalle\ChupiProject\Module\Color\Domain\ColorRepository;
use LaSalle\ChupiProject\Module\Color\Domain\Exceptions\EmptyColorException;

final class GetARandomColor
{
    private $repository;

    public function __construct(ColorRepository $colorRepository)
    {
        $this->repository = $colorRepository;
    }

    public function __invoke(): GetARandomColorResponse
    {
        $colors = $this->repository->all();

        if (empty($colors)) {
            throw new EmptyColorException();
        }

        $color = $this->repository->get($colors);

        return new GetARandomColorResponse($color->__toString());
    }
}