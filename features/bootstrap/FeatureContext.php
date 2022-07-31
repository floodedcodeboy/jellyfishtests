<?php

use Behat\Behat\Context\Context;

use function PHPUnit\Framework\assertEquals;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    private $stringCalculator;
    private $textToAdd;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
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
