<?php
declare(strict_types=1);

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use LaSalle\ChupiProject\Module\Color\Infrastructure\InMemoryColorRepository;
use LaSalle\ChupiProject\Module\Color\Infrastructure\Controller\GetARandomColorController;
use LaSalle\ChupiProject\Module\CoolWord\Infrastructure\InMemoryCoolWordRepository;
use LaSalle\ChupiProject\Module\CoolWord\Infrastructure\Controller\GetARandomWordController;
use LaSalle\ChupiProject\Module\Phrase\Infrastructure\Controller\GetARandomPhraseController;

use function PHPUnit\Framework\assertTrue;
use function PHPUnit\Framework\assertEquals;

/**
 * Defines application features from the specific context.
 */
final class FeatureContext implements Context
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    private $client;
    private $code;
    private $response;
    private $content;
    private $colorRepository;
    private $colorController;
    private $wordRepository;
    private $wordController;
    private $phraseController;

    public function __construct()
    {
        $this->client = new Client(['base_uri' => 'http://localhost:8088/']);
        $this->colorRepository = new InMemoryColorRepository();
        $this->wordRepository = new InMemoryCoolWordRepository();
    }

    /**
     * @Given I do a GET request a :uri
     */
    public function iDoAGETRequestA($uri)
    {
        try {
            $this->response = $this->client->request('GET', $uri, ['']);
            $this->code = $this->response->getStatusCode();
            $this->content = $this->response->getBody()->getContents();

        }catch (ClientException $exception){
            $this->code = $exception->getResponse()->getStatusCode();
        }
    }

    /**
     * @Then the response code should be :expectedStatusCode
     * @throws GuzzleHttp\Exception\ClientException
     */
    public function theResponseCodeShouldBe($expectedStatusCode)
    {
        if ($expectedStatusCode != $this->code){
            throw new ClientException('The expected code %s is not equal to the actual code %s', $expectedStatusCode, $this->code);
        }
    }

    /**
     * @Then the COLOR response should be:
     */
    public function theResponseShouldBe(PyStringNode $be)
    {
        $actualColor = $this->content;
        assertTrue(in_array($actualColor, $be->getStrings()), 'El color no esta contenido en la lista');
    }

    /**
     * @Then the WORD response should be:
     */
    public function theWORDResponseShouldBe(PyStringNode $be)
    {
        $actualWord = $this->content;
        assertTrue(in_array($actualWord, $be->getStrings()), 'La palabra no esta contenida en la lista');
    }

    /**
     * @Then the structure JSON response should be:
     */
    public function theStructureJSONResponseShouldBe(PyStringNode $be)
    {
        $actualJSON = json_decode(trim($this->content));
        $expectedJSON = json_decode(trim($be->getRaw()));

        $actualResponse = [];
        foreach ($actualJSON as $key => $value){
            array_push($actualResponse, $key);
        }

        $expectedResponse = [];
        foreach ($expectedJSON as $key => $value){
            array_push($expectedResponse, $key);
        }

        assertEquals($actualResponse, $expectedResponse, 'El JSON no tiene la estructura esperada');
    }

    /**
     * @When I call a Color controller
     */
    public function iCallAColorController()
    {
        $this->colorController = new GetARandomColorController();
    }

    /**
     * @Then the response body contains a color
     */
    public function theResponseBodyContainsAColor()
    {
        echo $this->colorController->__invoke();
    }

    /**
     * @When I call a Word controller
     */
    public function iCallAWordController()
    {
        $this->wordController = new GetARandomWordController();
    }

    /**
     * @Then /^the response body contains a word$/
     */
    public function theResponseBodyContainsAWord()
    {
        echo $this->wordController->__invoke();
    }

    /**
     * @When /^I call a Phrase controller$/
     */
    public function iCallAPhraseController()
    {
        $this->phraseController = new GetARandomPhraseController();
    }

    /**
     * @Then /^the response body contains a JSON$/
     */
    public function theResponseBodyContainsAJSON()
    {
        header('Content-Type: application/json');
        echo json_encode($this->phraseController->__invoke());
    }

}