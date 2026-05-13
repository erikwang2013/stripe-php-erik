<?php

namespace Erikwang2013\Stripe\Service;

/**
 * @internal
 *
 * @covers \Erikwang2013\Stripe\Service\BalanceService
 */
final class BalanceServiceTest extends \Erikwang2013\Stripe\TestCase
{
    use \Erikwang2013\Stripe\TestHelper;

    /** @var \Erikwang2013\Stripe\StripeClient */
    private $client;

    /** @var BalanceService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \Erikwang2013\Stripe\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        $this->service = new BalanceService($this->client);
    }

    public function testRetrieve()
    {
        $this->expectsRequest(
            'get',
            '/v1/balance'
        );
        $resource = $this->service->retrieve();
        self::assertInstanceOf(\Erikwang2013\Stripe\Balance::class, $resource);
    }
}
