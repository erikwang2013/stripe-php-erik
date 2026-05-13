<?php

namespace Erikwang2013\Stripe\Service;

/**
 * @internal
 *
 * @covers \Erikwang2013\Stripe\Service\PayoutService
 */
final class PayoutServiceTest extends \Erikwang2013\Stripe\TestCase
{
    use \Erikwang2013\Stripe\TestHelper;

    const TEST_RESOURCE_ID = 'po_123';

    /** @var \Erikwang2013\Stripe\StripeClient */
    private $client;

    /** @var PayoutService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \Erikwang2013\Stripe\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        $this->service = new PayoutService($this->client);
    }

    public function testAll()
    {
        $this->expectsRequest(
            'get',
            '/v1/payouts'
        );
        $resources = $this->service->all();
        self::compatAssertIsArray($resources->data);
        self::assertInstanceOf(\Erikwang2013\Stripe\Payout::class, $resources->data[0]);
    }

    public function testCancel()
    {
        $this->expectsRequest(
            'post',
            '/v1/payouts/' . self::TEST_RESOURCE_ID . '/cancel'
        );
        $resource = $this->service->cancel(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(\Erikwang2013\Stripe\Payout::class, $resource);
    }

    public function testCreate()
    {
        $this->expectsRequest(
            'post',
            '/v1/payouts'
        );
        $resource = $this->service->create([
            'amount' => 100,
            'currency' => 'usd',
        ]);
        self::assertInstanceOf(\Erikwang2013\Stripe\Payout::class, $resource);
    }

    public function testRetrieve()
    {
        $this->expectsRequest(
            'get',
            '/v1/payouts/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->retrieve(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(\Erikwang2013\Stripe\Payout::class, $resource);
    }

    public function testReverse()
    {
        $this->expectsRequest(
            'post',
            '/v1/payouts/' . self::TEST_RESOURCE_ID . '/reverse'
        );
        $resource = $this->service->reverse(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(\Erikwang2013\Stripe\Payout::class, $resource);
    }

    public function testUpdate()
    {
        $this->expectsRequest(
            'post',
            '/v1/payouts/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->update(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        self::assertInstanceOf(\Erikwang2013\Stripe\Payout::class, $resource);
    }
}
