<?php

namespace Erikwang2013\Stripe\Terminal;

/**
 * @internal
 *
 * @covers \Erikwang2013\Stripe\Terminal\ConnectionToken
 */
final class ConnectionTokenTest extends \Erikwang2013\Stripe\TestCase
{
    use \Erikwang2013\Stripe\TestHelper;

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/terminal/connection_tokens'
        );
        $resource = ConnectionToken::create();
        self::assertInstanceOf(ConnectionToken::class, $resource);
    }
}
