<?php

namespace Erikwang2013\Stripe\Service;

/**
 * @internal
 *
 * @covers \Erikwang2013\Stripe\Service\ApplicationFeeService
 */
final class ApplicationFeeServiceTest extends \Erikwang2013\Stripe\TestCase
{
    use \Erikwang2013\Stripe\TestHelper;

    const TEST_RESOURCE_ID = 'fee_123';
    const TEST_FEEREFUND_ID = 'fr_123';

    /** @var \Erikwang2013\Stripe\StripeClient */
    private $client;

    /** @var ApplicationFeeService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \Erikwang2013\Stripe\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        $this->service = new ApplicationFeeService($this->client);
    }

    public function testAll()
    {
        $this->expectsRequest(
            'get',
            '/v1/application_fees'
        );
        $resources = $this->service->all();
        self::compatAssertIsArray($resources->data);
        self::assertInstanceOf(\Erikwang2013\Stripe\ApplicationFee::class, $resources->data[0]);
    }

    public function testAllRefunds()
    {
        $this->expectsRequest(
            'get',
            '/v1/application_fees/' . self::TEST_RESOURCE_ID . '/refunds'
        );
        $resources = $this->service->allRefunds(self::TEST_RESOURCE_ID);
        self::compatAssertIsArray($resources->data);
        self::assertInstanceOf(\Erikwang2013\Stripe\ApplicationFeeRefund::class, $resources->data[0]);
    }

    public function testCreateRefund()
    {
        $this->expectsRequest(
            'post',
            '/v1/application_fees/' . self::TEST_RESOURCE_ID . '/refunds'
        );
        $resource = $this->service->createRefund(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(\Erikwang2013\Stripe\ApplicationFeeRefund::class, $resource);
    }

    public function testRetrieve()
    {
        $this->expectsRequest(
            'get',
            '/v1/application_fees/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->retrieve(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(\Erikwang2013\Stripe\ApplicationFee::class, $resource);
    }

    public function testRetrieveRefund()
    {
        $this->expectsRequest(
            'get',
            '/v1/application_fees/' . self::TEST_RESOURCE_ID . '/refunds/' . self::TEST_FEEREFUND_ID
        );
        $resource = $this->service->retrieveRefund(self::TEST_RESOURCE_ID, self::TEST_FEEREFUND_ID);
        self::assertInstanceOf(\Erikwang2013\Stripe\ApplicationFeeRefund::class, $resource);
    }

    public function testUpdateRefund()
    {
        $this->expectsRequest(
            'post',
            '/v1/application_fees/' . self::TEST_RESOURCE_ID . '/refunds/' . self::TEST_FEEREFUND_ID
        );
        $resource = $this->service->updateRefund(self::TEST_RESOURCE_ID, self::TEST_FEEREFUND_ID);
        self::assertInstanceOf(\Erikwang2013\Stripe\ApplicationFeeRefund::class, $resource);
    }
}
