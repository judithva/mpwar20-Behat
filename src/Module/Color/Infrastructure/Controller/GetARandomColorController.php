<?php
declare(strict_types=1);

namespace LaSalle\ChupiProject\Module\Color\Infrastructure\Controller;


use LaSalle\ChupiProject\Module\Color\Application\GetARandomColor;
use LaSalle\ChupiProject\Module\Color\Infrastructure\InMemoryColorRepository;

final class GetARandomColorController
{
    private $colorRepository;

    public function __construct()
    {
        $this->colorRepository = new InMemoryColorRepository();
    }

    public function __invoke(): string
    {
        $getARandomColor = new GetARandomColor($this->colorRepository);
        return $getARandomColor()->type();
    }
}