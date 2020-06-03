Feature: Random color api test
  Scenario: Get a random color
    Given I do a GET request a "/v1/color"
    Then the response code should be "200"
    And the COLOR response should be:

     """
     yellow
     red
     green
     cyan
     magenta
     black
     blue
     light_gray
     """

