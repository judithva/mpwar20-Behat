<?php require 'vendor/autoload.php';

use Colors\Color;
use Practica4\Module\Color\Domain\RandomColorSearcher;
use Practica4\Module\Color\Infrastructure\InMemoryColorRepository;
use Practica4\Module\CoolWord\Domain\RandomCoolWordSearcher;
use Practica4\Module\CoolWord\Infrastructure\InMemoryCoolWordRepository;

$wordSearcher  = new RandomCoolWordSearcher(new InMemoryCoolWordRepository());
$colorSearcher = new RandomColorSearcher(new InMemoryColorRepository());

$bgColor = $colorSearcher();
$fgColor = _random_color_except($bgColor, $colorSearcher);

$c = new Color();
echo $c($wordSearcher())->bg($bgColor)->$fgColor . PHP_EOL;

function _random_color_except(string $except, callable $randomColorSearcher): string
{
    $return = $except;

    while ($except === $return) {
        $return = $randomColorSearcher();
    }

    return $return;
}
