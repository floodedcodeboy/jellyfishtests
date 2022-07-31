Feature: String Calculator

    Scenario: Add an "" returns zero
        Given StringCalculator instance
        When I Add ""
        Then I expect it to return 0
