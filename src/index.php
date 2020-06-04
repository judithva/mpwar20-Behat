<?php
declare(strict_types=1);

use LaSalle\ChupiProject\Module\Color\Infrastructure\Controller\GetARandomColorController;
use LaSalle\ChupiProject\Module\CoolWord\Infrastructure\Controller\GetARandomWordController;
use LaSalle\ChupiProject\Module\Phrase\Infrastructure\Controller\GetARandomPhraseController;

require (__DIR__.'/../vendor/autoload.php');

const END_POINT_COLOR  = '/v1/color';         // Color => /v1/color
const END_POINT_WORD   = '/v1/word';          // CoolWord => /v1/word
const END_POINT_PHRASE = '/v1/phrase';        // Json => /v1/phrase

//echo  'URI=',$_SERVER["REQUEST_URI"] , "<br>";

if (isset($_SERVER['REQUEST_METHOD']) && ($_SERVER['REQUEST_METHOD'] == 'GET'))
{
    if (isset($_SERVER['REQUEST_URI']))
    {
        switch ($_SERVER['REQUEST_URI'])
        {
            case END_POINT_COLOR:
                getRandomColor();
                break;
            case END_POINT_WORD:
                getRandomWord();
                break;
            case END_POINT_PHRASE:
                getRandomPhrase();
                break;
            default:
                showError();
        }
    }
}

function getRandomColor(): void
{
    try{
        $colorController = new GetARandomColorController();
        header('HTTP/1.1 200');
        echo $colorController();

    }catch (Exception $error) {
        showError();
    }
}

function getRandomWord(): void
{
    try {
        $wordController = new GetARandomWordController();
        header('HTTP/1.1 200');
        echo $wordController();

    }catch (Exception $error) {
        showError();
    }
}

function getRandomPhrase(): void
{
    try {
        $phraseController = new GetARandomPhraseController();
        header('Content-Type: application/json');
        echo json_encode($phraseController());

    }catch (Exception $error) {
        showError();
    }
}

function showError(): void
{
    http_response_code(500);
    echo 'Ha ocurrido un problema en nuestra web.';
}
