<?php

declare(strict_types=1);

namespace Practica4Test\Application;


use LaSalle\ChupiProject\Module\Color\Domain\Exceptions\EmptyCoolWordException;
use PHPUnit\Framework\TestCase;
use LaSalle\ChupiProject\Module\Color\Domain\Exceptions\EmptyColorException;
use LaSalle\ChupiProject\Module\Color\Domain\RandomColorSearcher;
use LaSalle\ChupiProject\Module\Color\Infrastructure\InMemoryColorRepository;
use LaSalle\ChupiProject\Module\CoolWord\Domain\RandomCoolWordSearcher;
use LaSalle\ChupiProject\Module\CoolWord\Infrastructure\InMemoryCoolWordRepository;
use Practica4Test\Infrastructure\ColorRepositoryDummy;
use Practica4Test\Infrastructure\ColorRepositoryEmptyStub;
use Practica4Test\Infrastructure\ColorRepositoryStub;
use Practica4Test\Infrastructure\CoolWordRepositoryEmptyStub;
use Practica4Test\Infrastructure\CoolWordRepositoryStub;

class chupiTest extends TestCase
{
    /**
     * @test
     */
    public function shouldbeBgColorValid()
    {
        $colorRepository = new ColorRepositoryStub();
        $randomColorSearch = new RandomColorSearcher($colorRepository);
        $bgColorExpected = new InMemoryColorRepository();

        $this->assertTrue(
            in_array($randomColorSearch(), $bgColorExpected->all()),
            'No es un background-color válido'
        );
    }

    /**
     * @test
     */
   /*public function shouldbeFgColorValid()
    {
         $colorRepository = new ColorRepositoryStub();
         $randomColorSearch = new RandomColorSearcher($colorRepository);
         $bgColorExpected = new InMemoryColorRepository();
         $randomColorSearchExpected = new RandomColorSearcher($bgColorExpected);
         $fgColor = new RandomColorExcept($randomColorSearch(),$randomColorSearchExpected);

         $this->assertIsCallable($randomColorSearch, 'No es una función callable válida');
         $this->assertTrue(in_array($fgColor(), $bgColorExpected->all()), 'No es un foreground-color válido');
    }*/

    /**
     * @test
     */
    public function shouldbeWordValid()
    {
        $wordRepository = new CoolWordRepositoryStub();
        $randomWordSearch = new RandomCoolWordSearcher($wordRepository);
        $wordExpected = new InMemoryCoolWordRepository();

        $this->assertEquals(
            in_array($randomWordSearch(), $wordExpected->all()),
            true,
            'No son palabras iguales'
        );
    }

    /**
     * @test
     */
    public function shouldTrowExceptionOnEmptyColorsInMemory()
    {
        $this->expectException(EmptyColorException::class);

        $colorRepository = new ColorRepositoryEmptyStub();
        $randomColorSearch = new RandomColorSearcher($colorRepository);

        $randomColorSearch();
    }

    /**
     * @test
     */
    public function shouldTrowExceptionOnEmptyCoolWordInMemory()
    {
        $this->expectException(EmptyCoolWordException::class);

        $coolWordRepository = new CoolWordRepositoryEmptyStub();
        $randomCoolWordSearch = new RandomCoolWordSearcher($coolWordRepository);

        $randomCoolWordSearch();
    }
}