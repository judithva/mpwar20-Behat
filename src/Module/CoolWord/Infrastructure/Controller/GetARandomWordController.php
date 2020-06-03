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
        $wordRandomGet = new GetARandomWord($this->wordRepository);
        return $wordRandomGet()->type();
    }
}