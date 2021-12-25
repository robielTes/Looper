<?php

namespace App\Support;

use Jenssegers\Blade\Blade;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;

class View
{
    public $response;

    /**
     * will set response to success with 200 status code
     * @param ResponseFactoryInterface $factory
     */
    public function __construct(ResponseFactoryInterface $factory)
    {
        $this->response = $factory->createResponse(200, 'Success');
    }

    /**
     * @param string $template views page
     * @param array $with addition data
     * @return ResponseInterface response of success with status code 200 and
     * render new blade of given template and given array
     */
    public function __invoke(string $template = '', array $with = []): ResponseInterface
    {
        $cache = config('blade.cache');
        $views = config('blade.views');

        $blade = (new Blade($views, $cache))->make($template, $with);

        $this->response->getBody()->write($blade->render());

        return $this->response;
    }
}
