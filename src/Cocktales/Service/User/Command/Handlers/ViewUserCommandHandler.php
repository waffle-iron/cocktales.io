<?php

namespace Cocktales\Service\User\Command\Handlers;

use Cocktales\Domain\User\User;
use Cocktales\Domain\User\UserOrchestrator;
use Cocktales\Framework\Exceptions\NotFoundException;
use Cocktales\Service\User\Command\ViewUserCommand;

class ViewUserCommandHandler
{
    /**
     * @var UserOrchestrator
     */
    private $orchestrator;

    /**
     * ViewUserCommandHandler constructor.
     * @param UserOrchestrator $orchestrator
     */
    public function __construct(UserOrchestrator $orchestrator)
    {
        $this->orchestrator = $orchestrator;
    }

    /**
     * @param ViewUserCommand $command
     * @return User
     * @throws NotFoundException
     */
    public function handle(ViewUserCommand $command): User
    {
        return $this->orchestrator->getUserById($command->getId());
    }
}
