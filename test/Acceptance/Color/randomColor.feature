Feature: Random color Api test

  Scenario: Check the Api status
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
  Scenario: Get a random color
    When I call a Color controller
    Then the response body contains a color
    