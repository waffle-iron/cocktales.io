<?php

namespace Cocktales\Service\Profile\Command\Handlers;


use Cocktales\Domain\User\User;
use Cocktales\Domain\User\UserOrchestrator;
use Cocktales\Service\User\Command\Handlers\ViewUserCommandHandler;
use Cocktales\Service\User\Command\ViewUserCommand;

class ViewUserCommandHandlerTest extends \PHPUnit_Framework_TestCase
{
    public function test_handle_returns_user_object()
    {
        /** @var UserOrchestrator $orchestrator */
        $orchestrator = $this->prophesize(UserOrchestrator::class);
        $handler = new ViewUserCommandHandler($orchestrator->reveal());

        $user = (new User)->setId(1);

        $command = new ViewUserCommand($user->getId());

        $orchestrator->getUserById(1)->shouldBeCalled()->willReturn($user);

        $handler->handle($command);
    }
}
