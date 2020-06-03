<?php
declare(strict_types=1);

namespace LaSalle\ChupiProject\Module\Phrase\Application;


use LaSalle\ChupiProject\Module\Color\Application\GetARandomColor;
use LaSalle\ChupiProject\Module\Color\Application\RandomColorExcept;
use LaSalle\ChupiProject\Module\CoolWord\Application\GetARandomWord;
use LaSalle\ChupiProject\Module\Color\Domain\ColorRepository;
use LaSalle\ChupiProject\Module\CoolWord\Domain\CoolWordRepository;


final class GetARandomPhrase
{
    private $colorRepository;
    private $wordRepository;

    public function __construct(ColorRepository $colorRepository, CoolWordRepository $coolWordRepository)
    {
        $this->colorRepository = $colorRepository;
        $this->wordRepository = $coolWordRepository;
    }

    public function __invoke(): GetARandomPhraseResponse
    {
        $aRandomColor = new GetARandomColor($this->colorRepository);
        $aRandomWord = new GetARandomWord($this->wordRepository);
        $aRandomColorExcept = new RandomColorExcept($aRandomColor()->type(), $aRandomColor);

        return  new GetARandomPhraseResponse(["color" => $aRandomColor()->type(),
                                              "word"  => $aRandomWord()->type(),
                                              "fgcolor" => $aRandomColorExcept()]);
    }
}