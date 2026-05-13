<?php

namespace Erikwang2013\Stripe\Exception;

/**
 * @internal
 *
 * @covers \Erikwang2013\Stripe\Exception\ApiErrorException
 */
final class ApiErrorExceptionTest extends \Erikwang2013\Stripe\TestCase
{
    use \Erikwang2013\Stripe\TestHelper;

    public function createFixture()
    {
        $mock = $this->getMockForAbstractClass(ApiErrorException::class);

        return $mock::factory(
            'message',
            200,
            '{"error": {"code": "some_code"}}',
            ['error' => ['code' => 'some_code']],
            [
                'Some-Header' => 'Some Value',
                'Request-Id' => 'req_test',
            ],
            'some_code'
        );
    }

    public function testGetters()
    {
        $e = $this->createFixture();
        self::assertSame(200, $e->getHttpStatus());
        self::assertSame('{"error": {"code": "some_code"}}', $e->getHttpBody());
        self::assertSame(['error' => ['code' => 'some_code']], $e->getJsonBody());
        self::assertSame('Some Value', $e->getHttpHeaders()['Some-Header']);
        self::assertSame('req_test', $e->getRequestId());
        self::assertSame('some_code', $e->getStripeCode());
        self::assertNotNull($e->getError());
        self::assertSame('some_code', $e->getError()->code);
    }

    public function testToString()
    {
        $e = $this->createFixture();
        self::compatAssertStringContainsString('(Request req_test)', (string) $e);
        self::compatAssertStringContainsString('Error sending request to Stripe', (string) $e);
        self::compatAssertStringContainsString('Stack trace:', (string) $e);
    }
}
