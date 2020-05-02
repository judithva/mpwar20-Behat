<?php
declare(strict_types=1);

namespace Practica4Test\Application;


use PHPUnit\Framework\TestCase;
use Practica4\Module\Color\Application\RandomColorExcept;
use Practica4\Module\Color\Domain\RandomColorSearcher;
use Practica4\Module\Color\Infrastructure\InMemoryColorRepository;
use Practica4Test\Infrastructure\ColorRepositoryStub;

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

        $this->assertTrue(in_array($randomColorSearch(), $bgColorExpected->all()), 'No es un background-color válido');
    }

    /**
     * @test
     */
    public function shouldbeFgColorValid()
    {
        $colorRepository = new ColorRepositoryStub();
        $randomColorSearch = new RandomColorSearcher($colorRepository);
        $bgColorExpected = new InMemoryColorRepository();
        $randomColorSearchExpected = new RandomColorSearcher($bgColorExpected);
        $fgColor = new RandomColorExcept($randomColorSearch(),$randomColorSearchExpected);

        $this->assertIsCallable($randomColorSearch, 'No es una función callable válida');
        $this->assertTrue(in_array($fgColor(), $bgColorExpected->all()), 'No es un foreground-color válido');
    }
}