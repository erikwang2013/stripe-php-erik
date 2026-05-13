<?php

namespace Erikwang2013\Stripe\Service\Terminal;

/**
 * @internal
 *
 * @covers \Erikwang2013\Stripe\Service\Terminal\ConnectionTokenService
 */
final class ConnectionTokenServiceTest extends \Erikwang2013\Stripe\TestCase
{
    use \Erikwang2013\Stripe\TestHelper;

    /** @var \Erikwang2013\Stripe\StripeClient */
    private $client;

    /** @var ConnectionTokenService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \Erikwang2013\Stripe\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        $this->service = new ConnectionTokenService($this->client);
    }

    public function testCreate()
    {
        $this->expectsRequest(
            'post',
            '/v1/terminal/connection_tokens'
        );
        $resource = $this->service->create();
        self::assertInstanceOf(\Erikwang2013\Stripe\Terminal\ConnectionToken::class, $resource);
    }
}
