<?php

namespace Erikwang2013\Stripe\Service;

/**
 * @internal
 *
 * @covers \Erikwang2013\Stripe\Service\PlanService
 */
final class PlanServiceTest extends \Erikwang2013\Stripe\TestCase
{
    use \Erikwang2013\Stripe\TestHelper;

    const TEST_RESOURCE_ID = 'plan';

    /** @var \Erikwang2013\Stripe\StripeClient */
    private $client;

    /** @var PlanService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \Erikwang2013\Stripe\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        $this->service = new PlanService($this->client);
    }

    public function testAll()
    {
        $this->expectsRequest(
            'get',
            '/v1/plans'
        );
        $resources = $this->service->all();
        self::compatAssertIsArray($resources->data);
        self::assertInstanceOf(\Erikwang2013\Stripe\Plan::class, $resources->data[0]);
    }

    public function testCreate()
    {
        $this->expectsRequest(
            'post',
            '/v1/plans'
        );
        $resource = $this->service->create([
            'amount' => 100,
            'interval' => 'month',
            'currency' => 'usd',
            'nickname' => self::TEST_RESOURCE_ID,
            'id' => self::TEST_RESOURCE_ID,
        ]);
        self::assertInstanceOf(\Erikwang2013\Stripe\Plan::class, $resource);
    }

    public function testDelete()
    {
        $this->expectsRequest(
            'delete',
            '/v1/plans/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->delete(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(\Erikwang2013\Stripe\Plan::class, $resource);
    }

    public function testRetrieve()
    {
        $this->expectsRequest(
            'get',
            '/v1/plans/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->retrieve(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(\Erikwang2013\Stripe\Plan::class, $resource);
    }

    public function testUpdate()
    {
        $this->expectsRequest(
            'post',
            '/v1/plans/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->update(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        self::assertInstanceOf(\Erikwang2013\Stripe\Plan::class, $resource);
    }
}
