<?php
declare(strict_types=1);

namespace LaSalle\ChupiProject\Module\CoolWord\Domain;

use LaSalle\ChupiProject\Module\Color\Domain\Exceptions\EmptyCoolWordException;

final class RandomCoolWordSearcher
{
    private $repository;

    public function __construct(CoolWordRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(): string
    {
        $words = $this->repository->all();

        if (empty($words)) {
            throw new EmptyCoolWordException();
        }

        return $words[mt_rand(0, count($words) - 1)];
    }
}
