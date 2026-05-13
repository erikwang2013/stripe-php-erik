<?php

namespace Erikwang2013\Stripe\Exception;

/**
 * @internal
 *
 * @covers \Erikwang2013\Stripe\Exception\SignatureVerificationException
 */
final class SignatureVerificationExceptionTest extends \Erikwang2013\Stripe\TestCase
{
    use \Erikwang2013\Stripe\TestHelper;

    public function testGetters()
    {
        $e = SignatureVerificationException::factory('message', 'payload', 'sig_header');
        self::assertSame('message', $e->getMessage());
        self::assertSame('payload', $e->getHttpBody());
        self::assertSame('sig_header', $e->getSigHeader());
    }
}
