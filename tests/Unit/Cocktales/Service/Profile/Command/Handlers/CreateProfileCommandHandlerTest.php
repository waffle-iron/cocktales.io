<?php

namespace Cocktales\Service\Profile\Command\Handlers;


use Cocktales\Domain\Profile\ProfileOrchestrator;
use Cocktales\Service\Profile\Command\CreateProfileCommand;
use Prophecy\Argument;

class CreateProfileCommandHandlerTest extends \PHPUnit_Framework_TestCase
{
    public function test_handle_adds_new_profile_to_database()
    {
        /** @var ProfileOrchestrator $orchestrator */
        $orchestrator = $this->prophesize(ProfileOrchestrator::class);
        $handler = new CreateProfileCommandHandler($orchestrator->reveal());

        $command = new CreateProfileCommand((object) [
            'user_id' => 3,
            'location' => 'Consett',
            'slogan' => 'Millionaire in the making',
            'avatar' => 'image.jpg'
        ]);

        $orchestrator->addProfile(Argument::any())->shouldBeCalled();

        $handler->handle($command);
    }
}
