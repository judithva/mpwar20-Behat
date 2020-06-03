Feature: Random coolWord api test
  Scenario: Get a random color
    Given I do a GET request a "/v1/word"
    Then the response code should be "200"
    And the WORD response should be:

     """
     Chachi pistachi!
     Esto mola mogollón, tío!
     Mola mazo!
     Eres mazo guay
     Holiiiiii
     Besiis
     """

