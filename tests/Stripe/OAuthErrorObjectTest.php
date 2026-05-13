<?php

namespace Erikwang2013\Stripe;

/**
 * @internal
 *
 * @covers \Erikwang2013\Stripe\OAuthErrorObject
 */
final class OAuthErrorObjectTest extends TestCase
{
    use TestHelper;

    public function testDefaultValues()
    {
        $error = OAuthErrorObject::constructFrom([]);

        self::assertNull($error->error);
        self::assertNull($error->error_description);
    }
}
