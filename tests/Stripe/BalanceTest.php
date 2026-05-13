<?php

namespace Erikwang2013\Stripe;

/**
 * @internal
 *
 * @covers \Erikwang2013\Stripe\Balance
 */
final class BalanceTest extends TestCase
{
    use TestHelper;

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/balance'
        );
        $resource = Balance::retrieve();
        self::assertInstanceOf(Balance::class, $resource);
    }
}
