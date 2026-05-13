<?php

namespace Erikwang2013\Stripe\BillingPortal;

/**
 * @internal
 *
 * @covers \Erikwang2013\Stripe\BillingPortal\Session
 */
final class SessionTest extends \Erikwang2013\Stripe\TestCase
{
    use \Erikwang2013\Stripe\TestHelper;

    const TEST_RESOURCE_ID = 'pts_123';

    public function testIsCreatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/billing_portal/sessions'
        );
        $resource = Session::create([
            'customer' => 'cus_123',
            'return_url' => 'https://stripe.com/return',
        ]);
        self::assertInstanceOf(Session::class, $resource);
    }
}
