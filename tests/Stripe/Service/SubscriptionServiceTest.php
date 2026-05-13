<?php

namespace Erikwang2013\Stripe\Service;

/**
 * @internal
 *
 * @covers \Erikwang2013\Stripe\Service\SubscriptionService
 */
final class SubscriptionServiceTest extends \Erikwang2013\Stripe\TestCase
{
    use \Erikwang2013\Stripe\TestHelper;

    const TEST_RESOURCE_ID = 'sub_123';

    /** @var \Erikwang2013\Stripe\StripeClient */
    private $client;

    /** @var SubscriptionService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \Erikwang2013\Stripe\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        $this->service = new SubscriptionService($this->client);
    }

    public function testAll()
    {
        $this->expectsRequest(
            'get',
            '/v1/subscriptions'
        );
        $resources = $this->service->all();
        self::compatAssertIsArray($resources->data);
        self::assertInstanceOf(\Erikwang2013\Stripe\Subscription::class, $resources->data[0]);
    }

    public function testAllPagination()
    {
        $this->expectsRequest(
            'get',
            '/v1/subscriptions'
        );
        $resources = $this->service->all([
            'status' => 'all',
            'limit' => 100,
        ]);
        $filters = $resources->getFilters();
        self::assertSame($filters, [
            'status' => 'all',
            'limit' => 100,
        ]);
    }

    public function testCancel()
    {
        $this->expectsRequest(
            'delete',
            '/v1/subscriptions/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->cancel(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(\Erikwang2013\Stripe\Subscription::class, $resource);
    }

    public function testCreate()
    {
        $this->expectsRequest(
            'post',
            '/v1/subscriptions'
        );
        $resource = $this->service->create([
            'customer' => 'cus_123',
        ]);
        self::assertInstanceOf(\Erikwang2013\Stripe\Subscription::class, $resource);
    }

    public function testDeleteDiscount()
    {
        $this->expectsRequest(
            'delete',
            '/v1/subscriptions/' . self::TEST_RESOURCE_ID . '/discount'
        );
        $resource = $this->service->deleteDiscount(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(\Erikwang2013\Stripe\Discount::class, $resource);
        self::assertTrue($resource->isDeleted());
    }

    public function testRetrieve()
    {
        $this->expectsRequest(
            'get',
            '/v1/subscriptions/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->retrieve(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(\Erikwang2013\Stripe\Subscription::class, $resource);
    }

    public function testUpdate()
    {
        $this->expectsRequest(
            'post',
            '/v1/subscriptions/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->update(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        self::assertInstanceOf(\Erikwang2013\Stripe\Subscription::class, $resource);
    }
}
