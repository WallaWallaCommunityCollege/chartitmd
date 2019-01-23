@instructor
Feature: Patient management
    In order to manage patients
    As an instructor
    I need to be able to manage patients

    Scenario Outline: Add new patient
        Given I am a logged in instructor
        When I am on "/instructor/patient/"
        And I fill in "first name" with "<first_name>"
        And I fill in "last name" with "<last_name>"
        And I fill in "birth gender" with "<gender>"
        And I fill in "birthday" with "<birthday>"
        And I press "add"
        Then I should be on "/instructor/patient/"
        And I should see "<first_name>" in the "td" element
        And I should see "<last_name>" in the "td" element
        And I should see "<gender>" in the "td" element
        And I should see "<birthday>" in the "td" element

        Examples:
            | first_name | last_name | gender | birthday   |
            | John       | Doe       | male   | 1960-01-10 |
