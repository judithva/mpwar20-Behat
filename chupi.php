<?php require 'vendor/autoload.php';

use Colors\Color;
use Practica4\Module\Color\Domain\RandomColorSearcher;
use Practica4\Module\Color\Infrastructure\InMemoryColorRepository;
use Practica4\Module\CoolWord\Domain\RandomCoolWordSearcher;
use Practica4\Module\CoolWord\Infrastructure\InMemoryCoolWordRepository;

$wordSearcher  = new RandomCoolWordSearcher(new InMemoryCoolWordRepository());
$colorSearcher = new RandomColorSearcher(new InMemoryColorRepository());

$bgColor = $colorSearcher();
//var_dump('BCOLOR='.$bgColor);
$fgColor = _random_color_except($bgColor, $colorSearcher);
//var_dump('FGCOLOR='.$fgColor);
$c = new Color();
//$a=$c($wordSearcher());
//var_dump('Valor de A ='.$a);
//$a2=$a->bg($bgColor);
//var_dump('Valor de A2='.$a2);
//$a3=$a2->$fgColor;
//var_dump('Valor de A3='.$a3);
echo $c($wordSearcher())->bg($bgColor)->$fgColor . PHP_EOL;

function _random_color_except(string $except, callable $randomColorSearcher): string
{
    $return = $except;

    while ($except === $return) {
        $return = $randomColorSearcher();
    }

    return $return;
}
