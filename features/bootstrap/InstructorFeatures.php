<?php
declare(strict_types=1);

use Behat\Behat\Tester\Exception\PendingException;

trait InstructorFeatures
{
    /**
     * @Given I am a logged in instructor
     */
    public function iAmALoggedInInstructor()
    {
        throw new PendingException();
    }
    /**
     * @When I am on :arg1
     */
    public function iAmOn($arg1)
    {
        throw new PendingException();
    }
    /**
     * @When I fill in :arg1 with :arg2
     */
    public function iFillInWith($arg1, $arg2)
    {
        throw new PendingException();
    }
    /**
     * @When I press :arg1
     */
    public function iPress($arg1)
    {
        throw new PendingException();
    }
    /**
     * @Then I should be on :arg1
     */
    public function iShouldBeOn($arg1)
    {
        throw new PendingException();
    }
    /**
     * @Then I should see :arg1 in the :arg2 element
     */
    public function iShouldSeeInTheElement($arg1, $arg2)
    {
        throw new PendingException();
    }
}
