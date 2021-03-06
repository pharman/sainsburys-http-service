<?php
namespace SainsburysSpec\Sainsburys\HttpService\Components\ControllerClosures\Exception;

use Sainsburys\HttpService\Components\ControllerClosures\Exception\InvalidControllerException;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Teapot\StatusCode\Http;

/**
 * @mixin InvalidControllerException
 */
class InvalidControllerExceptionSpec extends ObjectBehavior
{
    function it_is_initialisable()
    {
        $this->shouldHaveType('Sainsburys\HttpService\Components\ControllerClosures\Exception\InvalidControllerException');
    }

    function it_has_a_meaningful_message()
    {
        $this->getMessage()->shouldBe('A controller failed to return a \Psr\Http\Message\ResponseInterface');
    }

    function it_has_a_500_status_code()
    {
        $statusCode = $this->getHttpStatusCode();

        $statusCode->shouldBe(Http::INTERNAL_SERVER_ERROR);
        $statusCode->shouldBe(500);
    }
}
