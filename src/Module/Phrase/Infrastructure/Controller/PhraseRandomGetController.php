<?php
declare(strict_types=1);

namespace LaSalle\ChupiProject\Module\Phrase\Infrastructure\Controller;


use LaSalle\ChupiProject\Module\Color\Infrastructure\InMemoryColorRepository;
use LaSalle\ChupiProject\Module\Phrase\Application\GetARandomPhrase;
use LaSalle\ChupiProject\Module\CoolWord\Infrastructure\InMemoryCoolWordRepository;
use LaSalle\ChupiProject\Module\Color\Application\GetARandomColor;
use LaSalle\ChupiProject\Module\CoolWord\Application\GetARandomWord;
use Practica4\Module\Color\Application\RandomColorExcept;

final class PhraseRandomGetController
{
    private $colorRepository;
    private $wordRepository;

    public function __construct()
    {
        $this->colorRepository = new InMemoryColorRepository();
        $this->wordRepository = new InMemoryCoolWordRepository();
    }

    public function __invoke(): array
    {
        $aRandomPhrase = new GetARandomPhrase($this->colorRepository, $this->wordRepository);
        return $aRandomPhrase()->type();
    }
}