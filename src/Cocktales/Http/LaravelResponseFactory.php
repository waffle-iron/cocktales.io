<?php

namespace Cocktales\Http;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\Factory;

class LaravelResponseFactory implements ResponseFactory
{
    private $viewFactory;

    public function __construct(Factory $viewFactory)
    {
        $this->viewFactory = $viewFactory;
    }

    public function makeResponse($content, $code = 200)
    {
        return new Response($content, $code);
    }

    public function makeJsonResponse($content, $code = 200)
    {
        return $this->makeResponse(json_encode($content), $code)->header('Content-type', 'text/json');
    }

    public function makeViewResponse($view, $data = [], $code = 200)
    {
        return $this->makeResponse($this->viewFactory->make($view, $data), $code);
    }

    public function makeRedirectResponse($location, $status = 302)
    {
        return new RedirectResponse($location, $status);
    }
}
