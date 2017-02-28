<?php

namespace Cocktales\Application\Http\Controllers;

use Chief\CommandBus;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Cocktales\Application\Http\ResponseFactory;
use Illuminate\Routing\Controller;

abstract class BaseController extends Controller
{
    protected $viewData = [];
    protected $responseFactory;
    /**
     * @var CommandBus
     */
    protected $bus;

    /**
     * @param ResponseFactory $responseFactory
     * @param CommandBus $bus
     */
    public function __construct(ResponseFactory $responseFactory, CommandBus $bus = null)
    {
        $this->responseFactory = $responseFactory;
        $this->bus = $bus;
    }

    /**
     * @param $view
     * @param array $data
     * @param int $code
     * @return \Illuminate\Http\Response
     */
    protected function makeViewResponse($view, $data = [], $code = 200)
    {
        return $this->responseFactory->makeViewResponse($view, $data ?: $this->viewData, $code);
    }

    /**
     * @param int $total
     * @param int $perPage
     * @param null $currentPage
     * @param null $path
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    protected function makePaginator($total, $perPage = 50, $currentPage = null, $path = null)
    {
        $currentPage = $currentPage ?: $this->request->input('page', 1);
        $offset = ($currentPage - 1) * $perPage;

        $paginator = new LengthAwarePaginator(
            [],
            $total,
            $perPage
        );

        if ($path) {
            $paginator->setPath($path);
        } else {
            $paginator->setPath($this->request->getPathInfo());
            $paginator->appends($this->request->query->all());
        }

        $paginator->offsetSet('itemOffset', $offset);

        return $paginator;
    }

    /**
     * @param Request $request
     * @return null
     */
    protected function getPreviousUrlFromSession(Request $request)
    {
        $url = $request->getSession() ? $request->getSession()->previousUrl() : null;

        if (!is_null($url)) {

            $path = parse_url($url, PHP_URL_PATH);

            if ($query = parse_url($url, PHP_URL_QUERY)) {
                return $path . '?' . $query;
            }

            return $path;
        }
    }
}
