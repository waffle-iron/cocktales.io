<?php

namespace Cocktales\Service\Profile\Command\Handlers;


use Cocktales\Domain\Profile\Profile;
use Cocktales\Domain\Profile\ProfileOrchestrator;
use Cocktales\Service\Profile\Command\ViewProfileCommand;

class ViewProfileCommandHandlerTest extends \PHPUnit_Framework_TestCase
{
    public function test_handle_retrieves_profile_from_database()
    {
        /** @var ProfileOrchestrator $orchestrator */
        $orchestrator = $this->prophesize(ProfileOrchestrator::class);
        $handler = new ViewProfileCommandHandler($orchestrator->reveal());

        $profile = (new Profile)->setUserId(007);

        $command = new ViewProfileCommand($profile->getUserId());

        $orchestrator->getProfileByUserId($profile->getUserId())->shouldBeCalled()->willReturn($profile);

        $handler->handle($command);
    }
}
