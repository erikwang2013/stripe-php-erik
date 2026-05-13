<?php

namespace Erikwang2013\Stripe\Service;

/**
 * @internal
 *
 * @covers \Erikwang2013\Stripe\Service\CouponService
 */
final class CouponServiceTest extends \Erikwang2013\Stripe\TestCase
{
    use \Erikwang2013\Stripe\TestHelper;

    const TEST_RESOURCE_ID = 'COUPON_ID';

    /** @var \Erikwang2013\Stripe\StripeClient */
    private $client;

    /** @var CouponService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \Erikwang2013\Stripe\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        $this->service = new CouponService($this->client);
    }

    public function testAll()
    {
        $this->expectsRequest(
            'get',
            '/v1/coupons'
        );
        $resources = $this->service->all();
        self::compatAssertIsArray($resources->data);
        self::assertInstanceOf(\Erikwang2013\Stripe\Coupon::class, $resources->data[0]);
    }

    public function testCreate()
    {
        $this->expectsRequest(
            'post',
            '/v1/coupons'
        );
        $resource = $this->service->create([
            'percent_off' => 25,
            'duration' => 'repeating',
            'duration_in_months' => 3,
        ]);
        self::assertInstanceOf(\Erikwang2013\Stripe\Coupon::class, $resource);
    }

    public function testDelete()
    {
        $this->expectsRequest(
            'delete',
            '/v1/coupons/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->delete(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(\Erikwang2013\Stripe\Coupon::class, $resource);
    }

    public function testRetrieve()
    {
        $this->expectsRequest(
            'get',
            '/v1/coupons/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->retrieve(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(\Erikwang2013\Stripe\Coupon::class, $resource);
    }

    public function testUpdate()
    {
        $this->expectsRequest(
            'post',
            '/v1/coupons/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->update(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        self::assertInstanceOf(\Erikwang2013\Stripe\Coupon::class, $resource);
    }
}
