<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\AfterStepScope;
use Behat\Testwork\Tester\Result\TestResult;
use BehatExpectException\ExpectException;
use BehatExpectException\ExceptionExpectationFailed;
use BehatExpectException\ExpectedAnException;
use function PHPUnit\Framework\assertEquals;

class FeatureContext implements Context
{
    use ExpectException;

    private $stringCalculator;
    private $textToAdd;

    public function __construct()
    {
    }

    /**
     * @Given /^StringCalculator instance$/
     */
    public function stringcalculatorInstance(): void
    {
        $this->stringCalculator = new StringCalculator();
    }

    /**
    * @When /^I Add "([^"]*)"$/
    */
    public function iAdd(string $text): void
    {
        $this->textToAdd = $text;
    }

    /**
     * @When I run a step that throws a :exceptionClass with a message :exceptionMessage
     */
    public function iRunSomeCodeThatThrowsAnException(string $exceptionClass, string $exceptionMessage): void
    {
        $this->shouldFail(
            function () use ($exceptionClass, $exceptionMessage) {
                throw new $exceptionClass($exceptionMessage);
            }
        );
    }

    /**
     * @Then I expect it to confirm the :arg1 was thrown with a message :arg2
     */
    public function iExpectItToConfirmTheNegativesnotallowedexceptionWasThrownWithAMessage(string $exceptionClass, string $exceptionMessage): void
    {
        $this->assertCaughtExceptionMatches(
            $exceptionClass,
            $exceptionMessage
        );
    }

    /**
     * @When I Add :arg1 it throws a :arg2 with a message :arg3
     */
    public function iAddItThrowsANegativesnotallowedexceptionWithAMessage(string $arg1, string $arg2, string $arg3): void
    {
        $this->shouldFail(
            function () use ($arg1, $arg2, $arg3) {
                throw new $arg2($arg3 . '(' . $arg1 . ')');
            }
        );
    }

    /**
    * @Then /^I expect it to return (\d+)$/
    */
    public function iExpectItToReturn(string $expected): void
    {
        assertEquals($expected, $this->stringCalculator->add($this->textToAdd));
    }

}
