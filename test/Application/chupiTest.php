<?php
declare(strict_types=1);

namespace Practica4Test\Application;


use PHPUnit\Framework\TestCase;
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

}