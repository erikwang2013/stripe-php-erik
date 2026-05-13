<?php

namespace Erikwang2013\Stripe\Util;

/**
 * @internal
 *
 * @covers \Erikwang2013\Stripe\Util\ObjectTypes
 */
final class ObjectTypesTest extends \Erikwang2013\Stripe\TestCase
{
    use \Erikwang2013\Stripe\TestHelper;

    public function testMapping()
    {
        self::assertSame(ObjectTypes::mapping['charge'], \Erikwang2013\Stripe\Charge::class);
        self::assertSame(ObjectTypes::mapping['checkout.session'], \Erikwang2013\Stripe\Checkout\Session::class);
    }
}
