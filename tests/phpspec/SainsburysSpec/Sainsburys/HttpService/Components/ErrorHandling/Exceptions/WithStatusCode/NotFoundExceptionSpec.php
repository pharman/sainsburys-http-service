<?php
namespace SainsburysSpec\Sainsburys\HttpService\Components\ErrorHandling\Exceptions\WithStatusCode;

use Sainsburys\HttpService\Components\ErrorHandling\Exceptions\WithStatusCode\NotFoundException;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Teapot\StatusCode\Http;

/**
 * @mixin NotFoundException
 */
class NotFoundExceptionSpec extends ObjectBehavior
{
    function it_is_initialisable()
    {
        $this->shouldHaveType('\Sainsburys\HttpService\Components\ErrorHandling\Exceptions\WithStatusCode\NotFoundException');
    }

    function it_has_a_meaningful_message()
    {
        $this->getMessage()->shouldBe('Resource or endpoint not found.');
    }

    function it_has_a_404_status_code()
    {
        $statusCode = $this->getHttpStatusCode();

        $statusCode->shouldBe(Http::NOT_FOUND);
        $statusCode->shouldBe(404);
    }
}
