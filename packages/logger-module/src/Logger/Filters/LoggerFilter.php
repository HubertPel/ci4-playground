<?php

namespace Verbum\Logger\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Verbum\Logger\LoggerService;

class LoggerFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (ENVIRONMENT === 'testing') {
            return;
        }

        if (session()->has('user_id')) {
            (new LoggerService())->log(
                $request->getMethod().' '.$request->getUri()->getPath()
            );
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
