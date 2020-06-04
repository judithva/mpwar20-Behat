<?php
declare(strict_types=1);

namespace Practica4Test\Application;


use LaSalle\ChupiProject\Module\CoolWord\Application\GetARandomWord;
use LaSalle\ChupiProject\Module\CoolWord\Domain\Exceptions\EmptyCoolWordException;
use LaSalle\ChupiProject\Module\CoolWord\Application\CoolWordBuilder;
use LaSalle\ChupiProject\Module\CoolWord\Domain\CoolWord;
use LaSalle\ChupiProject\Module\CoolWord\Infrastructure\InMemoryCoolWordRepository;
use Practica4Test\Infrastructure\CoolWordRepositoryInvalidSpy;
use Practica4Test\Infrastructure\CoolWordRepositoryValidSpy;
use Practica4Test\Infrastructure\CoolWordRepositoryEmptyStub;
use Practica4Test\Infrastructure\CoolWordRepositoryStub;
use PHPUnit\Framework\TestCase;

class wordTest extends TestCase
{
    /**
     * @test
     */
    public function shouldbeWordValid()
    {
        $wordRepository = new CoolWordRepositoryStub();
        $getARandomWord = new GetARandomWord($wordRepository);
        $wordExpected = new InMemoryCoolWordRepository();

        $this->assertEquals(
            in_array($getARandomWord()->type(), $wordExpected->all()),
            true,
            'No son palabras iguales'
        );
    }

    /**
     * @test
     */
    public function shouldTrowExceptionOnEmptyCoolWordInMemory()
    {
        $this->expectException(EmptyCoolWordException::class);

        $coolWordRepository = new CoolWordRepositoryEmptyStub();
        $getARandomWord = new GetARandomWord($coolWordRepository);

        $getARandomWord();
    }

    /**
     * @test
     */
   public function shouldbeCoolWordValidSpy()
    {
        $wordRepository = new CoolWordRepositoryValidSpy();
        $getARandomWord = new GetARandomWord($wordRepository);

        $this->assertEquals('Holiiiiii', $getARandomWord()->type(), 'CoolWord diferente');
        $this->assertTrue($wordRepository->allWasCalled(),'No se llamó el allWasCalled');
    }

    /**
     * @test
     */
    public function shouldThrowExceptionCoolWordWhenEmptyInvalidSpy()
    {
        $this->expectException(EmptyCoolWordException::class);

        $wordRepository = new CoolWordRepositoryInvalidSpy();
        $getARandomWord = new GetARandomWord($wordRepository);

        $this->assertEquals('', $getARandomWord()->type(), 'Existe un CoolWord');
        $this->assertFalse($wordRepository->allWasCalled(),'Se llamó el allWasCalled');
    }

    /**
     * @test
     */
    public function shouldbeCoolWordFluentBuilder()
    {
        $coolWordRepository = new InMemoryCoolWordRepository();
        $newCoolWord = (new CoolWordBuilder())->random($coolWordRepository->all())->build();

        $this->assertInstanceOf(CoolWord::class, $newCoolWord);
    }
}