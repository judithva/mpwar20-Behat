<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

use function PHPUnit\Framework\assertTrue;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
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

    public function __construct()
    {
        $this->client = new Client(['base_uri' => 'http://localhost:8088/']);
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
        $expectedColor = $this->content;
        assertTrue(in_array($expectedColor, $be->getStrings()), 'El color no esta contenido en la lista');
    }
}
