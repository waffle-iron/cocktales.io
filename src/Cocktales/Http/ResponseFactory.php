<?php

namespace Cocktales\Http;

interface ResponseFactory
{
    /**
     * @param $content
     * @param int $code
     * @return \Illuminate\Http\Response
     */
    public function makeResponse($content, $code = 200);

    /**
     * @param $content
     * @param int $code
     * @return \Illuminate\Http\Response
     */
    public function makeJsonResponse($content, $code = 200);

    /**
     * @param string $view The template to use
     * @param array $data Data to pass to the template
     * @param int $code
     * @return \Illuminate\Http\Response
     */
    public function makeViewResponse($view, $data = [], $code = 200);

    /**
     * @param string $location The redirect URL
     * @param int $status The response status code (301 or 302)
     * @return \Illuminate\Http\Response
     */
    public function makeRedirectResponse($location, $status = 302);
}
