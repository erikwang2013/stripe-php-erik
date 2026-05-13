<?php

namespace Erikwang2013\Stripe\Service;

/**
 * @internal
 *
 * @covers \Erikwang2013\Stripe\Service\SourceService
 */
final class SourceServiceTest extends \Erikwang2013\Stripe\TestCase
{
    use \Erikwang2013\Stripe\TestHelper;

    const TEST_RESOURCE_ID = 'src_123';

    /** @var \Erikwang2013\Stripe\StripeClient */
    private $client;

    /** @var SourceService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \Erikwang2013\Stripe\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        $this->service = new SourceService($this->client);
    }

    public function testAllTransactions()
    {
        $this->expectsRequest(
            'get',
            '/v1/sources/' . self::TEST_RESOURCE_ID . '/source_transactions'
        );
        $resources = $this->service->allSourceTransactions(self::TEST_RESOURCE_ID);
        self::compatAssertIsArray($resources->data);
        self::assertInstanceOf(\Erikwang2013\Stripe\SourceTransaction::class, $resources->data[0]);
    }

    public function testCreate()
    {
        $this->expectsRequest(
            'post',
            '/v1/sources'
        );
        $resource = $this->service->create([
            'type' => 'card',
        ]);
        self::assertInstanceOf(\Erikwang2013\Stripe\Source::class, $resource);
    }

    public function testDetach()
    {
        $this->expectsRequest(
            'delete',
            '/v1/customers/cus_123/sources/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->detach('cus_123', self::TEST_RESOURCE_ID);
        // static::assertInstanceOf(\Erikwang2013\Stripe\Source::class, $resource);
    }

    public function testRetrieve()
    {
        $this->expectsRequest(
            'get',
            '/v1/sources/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->retrieve(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(\Erikwang2013\Stripe\Source::class, $resource);
    }

    public function testUpdate()
    {
        $this->expectsRequest(
            'post',
            '/v1/sources/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->update(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        self::assertInstanceOf(\Erikwang2013\Stripe\Source::class, $resource);
    }

    public function testVerify()
    {
        $this->expectsRequest(
            'post',
            '/v1/sources/' . self::TEST_RESOURCE_ID . '/verify'
        );
        $resource = $this->service->verify(self::TEST_RESOURCE_ID, ['values' => [32, 45]]);
        self::assertInstanceOf(\Erikwang2013\Stripe\Source::class, $resource);
    }
}
