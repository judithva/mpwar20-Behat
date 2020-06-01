<?php
declare(strict_types=1);

namespace LaSalle\ChupiProject\Module\CoolWord\Infrastructure\Controller;


use LaSalle\ChupiProject\Module\CoolWord\Application\GetARandomWord;
use LaSalle\ChupiProject\Module\CoolWord\Infrastructure\InMemoryCoolWordRepository;

final class GetARandomWordController
{
    private $wordRepository;

    public function __construct()
    {
        $this->wordRepository = new InMemoryCoolWordRepository();
    }

    public function __invoke(): string
    {
        /*$words = $this->wordRepository->all();
        if (empty($words)) {
            throw new EmptyCoolWordException();
        }
        return  $words[mt_rand(0, count($words) - 1)];*/

        $wordRandomGet = new GetARandomWord($this->wordRepository);
        return $wordRandomGet()->type();
    }
}