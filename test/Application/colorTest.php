<?php
declare(strict_types=1);

namespace Practica4Test\Application;


use Colors\Color;
use LaSalle\ChupiProject\Module\Color\Application\ColorBuilder;
use LaSalle\ChupiProject\Module\Color\Application\GetARandomColor;
use LaSalle\ChupiProject\Module\Color\Domain\Exceptions\EmptyColorException;
use LaSalle\ChupiProject\Module\Color\Infrastructure\InMemoryColorRepository;
use Practica4Test\Infrastructure\ColorRepositoryEmptyStub;
use Practica4Test\Infrastructure\ColorRepositoryInvalidSpy;
use Practica4Test\Infrastructure\ColorRepositoryStub;
use Practica4Test\Infrastructure\ColorRepositoryValidSpy;
use PHPUnit\Framework\TestCase;

class colorTest extends TestCase
{
    /**
     * @test
     */
    public function shouldbeBgColorValid()
    {
        $colorRepository = new ColorRepositoryStub();
        $getARandomColor = new GetARandomColor($colorRepository);
        $bgColorExpected = new InMemoryColorRepository();

        $this->assertTrue(
            in_array($getARandomColor()->type(), $bgColorExpected->all()),
            'No es un background-color válido'
        );
    }

    /**
     * @test
     */
    public function shouldTrowExceptionOnEmptyColorsInMemory()
    {
        $this->expectException(EmptyColorException::class);

        $colorRepository = new ColorRepositoryEmptyStub();
        $getARandomColor = new GetARandomColor($colorRepository);

        $getARandomColor();
    }

    /**
     * @test
     */
    public function shouldbeColorValidSpy()
    {
        $colorRepository = new ColorRepositoryValidSpy();
        $getARandomColor = new GetARandomColor($colorRepository);

        $this->assertEquals('red', $getARandomColor()->type(), 'el Color es diferente');
        $this->assertTrue($colorRepository->allWasCalled(),'No se llamó el allWasCalled');
    }

    /**
     * @test
     */
    public function shouldThrowExceptionColorEmptyInvalidSpy()
    {
        $this->expectException(EmptyColorException::class);

        $colorRepository = new ColorRepositoryInvalidSpy();
        $getARandomColor = new GetARandomColor($colorRepository);

        $this->assertEquals('', $getARandomColor()->type(), 'El arreglo de Color no está vacío');
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