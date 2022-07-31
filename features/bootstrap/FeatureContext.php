<?php

use Behat\Behat\Context\Context;

use function PHPUnit\Framework\assertEquals;

class FeatureContext implements Context
{
    private $stringCalculator;
    private $textToAdd;

    public function __construct()
    {
    }

    /**
     * @Given /^StringCalculator instance$/
     */
    public function stringcalculatorInstance()
    {
        $this->stringCalculator = new StringCalculator();
    }

    /**
    * @When /^I Add "([^"]*)"$/
    */
    public function iAdd($text)
    {
        $this->textToAdd = $text;
    }

    /**
    * @Then /^I expect it to return (\d+)$/
    */
    public function iExpectItToReturn($expected)
    {
        assertEquals($expected, $this->stringCalculator->add($this->textToAdd));
    }
}
