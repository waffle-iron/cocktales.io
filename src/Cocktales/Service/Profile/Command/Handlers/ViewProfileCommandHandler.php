<?php

namespace Cocktales\Service\Profile\Command\Handlers;


use Cocktales\Domain\Profile\Profile;
use Cocktales\Domain\Profile\ProfileOrchestrator;
use Cocktales\Framework\Exceptions\NotFoundException;
use Cocktales\Service\Profile\Command\ViewProfileCommand;

class ViewProfileCommandHandler
{
    /**
     * @var ProfileOrchestrator
     */
    private $orchestrator;

    /**
     * ViewProfileCommandHandler constructor.
     * @param ProfileOrchestrator $orchestrator
     */
    public function __construct(ProfileOrchestrator $orchestrator)
    {
        $this->orchestrator = $orchestrator;
    }

    /**
     * @param ViewProfileCommand $command
     * @return Profile
     * @throws NotFoundException
     */
    public function handle(ViewProfileCommand $command): Profile
    {
        return $this->orchestrator->getProfileByUserId($command->getUserId());
    }
}
