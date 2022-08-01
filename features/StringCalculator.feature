Feature: String Calculator

    Scenario: Add an "" returns zero
        Given StringCalculator instance
        When I Add ""
        Then I expect it to return 0

    Scenario: Add "1" returns 1
        Given StringCalculator instance
        When I Add "1"
        Then I expect it to return 1

    Scenario: Add "2" return 2
        Given StringCalculator instance
        When I Add "2"
        Then I expect it to return 2

    Scenario: Add "1,2" return 3
        Given StringCalculator instance
        When I Add "1,2"
        Then I expect it to return 3

    Scenario: Add "1|2,3" return 6
        Given StringCalculator instance
        When I Add "1|2,3"
        Then I expect it to return 6

    Scenario: Add "//;\n1;2" return 3
        Given StringCalculator instance
        When I Add "//;\n1;2"
        Then I expect it to return 3

    Scenario: Add "-1" return "-1"
        Given StringCalculator instance
        When I Add "-1" it throws a NegativesNotAllowedException with a message "Negatives are not allowed"
        Then I expect it to confirm the NegativesNotAllowedException was thrown with a message "Negatives are not allowed(-1)"

    Scenario: Add "-1, -3" return "-1, -3"
        Given StringCalculator instance
        When I Add "-1,-3" it throws a NegativesNotAllowedException with a message "Negatives are not allowed"
        Then I expect it to confirm the NegativesNotAllowedException was thrown with a message "Negatives are not allowed(-1,-3)"
