<?php

namespace Erikwang2013\Stripe\Service\Issuing;

/**
 * @internal
 *
 * @covers \Erikwang2013\Stripe\Service\Issuing\DisputeService
 */
final class DisputeServiceTest extends \Erikwang2013\Stripe\TestCase
{
    use \Erikwang2013\Stripe\TestHelper;

    const TEST_RESOURCE_ID = 'idp_123';

    /** @var \Erikwang2013\Stripe\StripeClient */
    private $client;

    /** @var DisputeService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \Erikwang2013\Stripe\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        $this->service = new DisputeService($this->client);
    }

    public function testAll()
    {
        $this->expectsRequest(
            'get',
            '/v1/issuing/disputes'
        );
        $resources = $this->service->all();
        self::compatAssertIsArray($resources->data);
        self::assertInstanceOf(\Erikwang2013\Stripe\Issuing\Dispute::class, $resources->data[0]);
    }

    public function testCreate()
    {
        $params = [
            'transaction' => 'ipi_123',
        ];

        $this->expectsRequest(
            'post',
            '/v1/issuing/disputes',
            $params
        );
        $resource = $this->service->create($params);
        self::assertInstanceOf(\Erikwang2013\Stripe\Issuing\Dispute::class, $resource);
    }

    public function testRetrieve()
    {
        $this->expectsRequest(
            'get',
            '/v1/issuing/disputes/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->retrieve(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(\Erikwang2013\Stripe\Issuing\Dispute::class, $resource);
    }

    public function testUpdate()
    {
        $this->expectsRequest(
            'post',
            '/v1/issuing/disputes/' . self::TEST_RESOURCE_ID,
            ['metadata' => ['key' => 'value']]
        );
        $resource = $this->service->update(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        self::assertInstanceOf(\Erikwang2013\Stripe\Issuing\Dispute::class, $resource);
    }

    public function testSubmit()
    {
        $this->expectsRequest(
            'post',
            '/v1/issuing/disputes/' . self::TEST_RESOURCE_ID . '/submit',
            ['metadata' => ['key' => 'value']]
        );
        $resource = $this->service->submit(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        self::assertInstanceOf(\Erikwang2013\Stripe\Issuing\Dispute::class, $resource);
    }
}
