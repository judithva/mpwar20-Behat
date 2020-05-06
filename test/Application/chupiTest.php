<?php

declare(strict_types=1);

namespace Practica4Test\Application;


use LaSalle\ChupiProject\Module\Color\Application\ColorBuilder;
use LaSalle\ChupiProject\Module\Color\Application\Factory;
use LaSalle\ChupiProject\Module\Color\Domain\Color;
use LaSalle\ChupiProject\Module\Color\Domain\Exceptions\EmptyCoolWordException;
use PHPUnit\Framework\TestCase;
use LaSalle\ChupiProject\Module\Color\Domain\Exceptions\EmptyColorException;
use LaSalle\ChupiProject\Module\Color\Domain\RandomColorSearcher;
use LaSalle\ChupiProject\Module\Color\Infrastructure\InMemoryColorRepository;
use LaSalle\ChupiProject\Module\CoolWord\Domain\RandomCoolWordSearcher;
use LaSalle\ChupiProject\Module\CoolWord\Infrastructure\InMemoryCoolWordRepository;
use Practica4Test\Infrastructure\ColorRepositoryEmptyStub;
use Practica4Test\Infrastructure\ColorRepositoryInvalidSpy;
use Practica4Test\Infrastructure\ColorRepositoryStub;
use Practica4Test\Infrastructure\ColorRepositoryValidSpy;
use Practica4Test\Infrastructure\CoolWordRepositoryInvalidSpy;
use Practica4Test\Infrastructure\CoolWordRepositoryValidSpy;
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

    /**
     * @test
     */
    public function shouldbeCoolWordValidSpy()
    {
        $wordRepository = new CoolWordRepositoryValidSpy();
        $randomWordSearch = new RandomCoolWordSearcher($wordRepository);

        $this->assertEquals('Holiiiiii', $randomWordSearch(), 'CoolWord diferente');
        $this->assertTrue($wordRepository->allWasCalled(),'No se llamó el allWasCalled');
    }

    /**
     * @test
     */
    public function shouldThrowExceptionCoolWordWhenEmptyInvalidSpy()
    {
        $this->expectException(EmptyCoolWordException::class);

        $wordRepository = new CoolWordRepositoryInvalidSpy();
        $randomWordSearch = new RandomCoolWordSearcher($wordRepository);

        $this->assertEquals('', $randomWordSearch(), 'Existe un CoolWord');
        $this->assertFalse($wordRepository->allWasCalled(),'Se llamó el allWasCalled');
    }

    /**
     * @test
     */
    public function shouldbeColorValidSpy()
    {
        $colorRepository = new ColorRepositoryValidSpy();
        $randomWordSearch = new RandomColorSearcher($colorRepository);

        $this->assertEquals('red', $randomWordSearch(), 'el Color es diferente');
        $this->assertTrue($colorRepository->allWasCalled(),'No se llamó el allWasCalled');
    }

    /**
     * @test
     */
    public function shouldThrowExceptionColorEmptyInvalidSpy()
    {
        $this->expectException(EmptyColorException::class);

        $colorRepository = new ColorRepositoryInvalidSpy();
        $randomColorSearch = new RandomColorSearcher($colorRepository);

        $this->assertEquals('', $randomColorSearch(), 'El arreglo de Color no está vacío');
        $this->assertFalse($colorRepository->allWasCalled(),'Se llamó el allWasCalled');
    }

    /**
     * @test
     */
    public function shouldbeColorFluentBuilder()
    {
        $colorRepository = new InMemoryColorRepository();
        $newColor = (new ColorBuilder())->random($colorRepository->all())->build();

        $this->assertInstanceOf(Color::class, $newColor);
    }

}