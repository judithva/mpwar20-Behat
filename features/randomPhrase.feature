Feature: Random phrase Api test

  Scenario: Check the Api status
    Given I do a GET request a "/v1/phrase"
    Then the response code should be "200"
    And the structure JSON response should be:
    """
    {
      "color":"blue",
      "word":"Holiiiiii",
      "fgcolor":"yellow"
    }
    """
