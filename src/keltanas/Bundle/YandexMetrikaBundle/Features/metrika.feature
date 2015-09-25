Feature: metrika
    Check, that code has installed

    @mink:symfony2
    Scenario: Check installed code
        Given I go to "/"
        Then the response status code should be 200
         And I should see "Hello Yandex"
         And I should see "w.yaCountertest_test"
