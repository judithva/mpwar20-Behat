<?php
declare(strict_types=1);

namespace LaSalle\ChupiProject\Module\CoolWord\Application;


use LaSalle\ChupiProject\Module\CoolWord\Domain\CoolWordRepository;
use LaSalle\ChupiProject\Module\CoolWord\Domain\Exceptions\EmptyCoolWordException;

final class GetARandomWord
{
    private $repository;

    public function __construct(CoolWordRepository $coolWordRepository)
    {
        $this->repository = $coolWordRepository;
    }

    public function __invoke(): GetARandomWordResponse
    {
        $words = $this->repository->all();

        if (empty($words)) {
            throw new EmptyCoolWordException();
        }

        $word = $this->repository->get($words);

        return new GetARandomWordResponse($word->getCoolWord());
    }
}