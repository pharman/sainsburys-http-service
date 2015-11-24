<?php
namespace Sainsburys\HttpService\Framework\Controller\ControllerClosureBuilder;

use Sainsburys\HttpService\Framework\Controller\ControllerClosureBuilder;
use Sainsburys\HttpService\Framework\ErrorHandling\ErrorController;
use Sainsburys\HttpService\Framework\Routing\Route;
use Interop\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

class SimpleControllerClosureBuilder implements ControllerClosureBuilder
{
    /**
     * @param ContainerInterface $container
     * @param Route              $route
     * @param ErrorController    $errorController
     * @return callable
     */
    public function buildControllerClosure(ContainerInterface $container, Route $route, ErrorController $errorController)
    {
        $controllerServiceId = $route->controllerServiceId();
        $actionMethodName    = $route->actionMethodName();

        $controllerClosure =
            function (ServerRequestInterface $request, ResponseInterface $response) use (
                $container, $controllerServiceId, $actionMethodName
            ) {
                $controllerObject   = $container->get($controllerServiceId);
                $controllerResponse = $controllerObject->$actionMethodName($request, $response);
                return $controllerResponse;
            };

        return $controllerClosure;
    }
}