<?php

namespace Cocktales\Application\Http\Controllers;

use Cocktales\Service\Profile\Command\CreateProfileCommand;
use Cocktales\Service\Profile\Command\ViewProfileCommand;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProfileController extends BaseController
{
    /**
     * @return Response
     */
    public function create(): Response
    {
        return $this->responseFactory->makeViewResponse('http.profile.create');
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        $data = (object) [
            'user_id' => $request->get('user_id'),
            'location' => $request->get('location'),
            'slogan' => $request->get('slogan'),
            'favourite_drink' => $request->get('favourite_drink')
        ];

        $this->bus->execute(new CreateProfileCommand($data));

        return $this->responseFactory->makeRedirectResponse('/home');
    }

    /**
     * @param int $user_id
     * @return Response
     */
    public function show(int $user_id): Response
    {
        return $this->responseFactory->makeViewResponse('http.profile.show', [
            'profile' => $this->bus->execute(new ViewProfileCommand($user_id))
        ]);
    }
}
