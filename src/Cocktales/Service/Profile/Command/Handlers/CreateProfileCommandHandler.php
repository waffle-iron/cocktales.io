<?php

namespace Cocktales\Service\Profile\Command\Handlers;

use Cocktales\Domain\Profile\Profile;
use Cocktales\Domain\Profile\ProfileOrchestrator;
use Cocktales\Service\Profile\Command\CreateProfileCommand;

class CreateProfileCommandHandler
{
    /**
     * @var ProfileOrchestrator
     */
    private $orchestrator;

    /**
     * CreateProfileCommandHandler constructor.
     * @param ProfileOrchestrator $orchestrator
     */
    public function __construct(ProfileOrchestrator $orchestrator)
    {
        $this->orchestrator = $orchestrator;
    }

    public function handle(CreateProfileCommand $command)
    {
        $this->orchestrator->addProfile(function (Profile $profile) use ($command) {
              $profile->setUserId($command->getUserId());
              $profile->setLocation($command->getLocation());
              $profile->setSlogan($command->getSlogan());
              $profile->setFavouriteDrink($command->getFavouriteDrink());
        });
    }
}
