<?php

namespace Erikwang2013\Stripe\Service\Radar;

/**
 * @internal
 *
 * @covers \Erikwang2013\Stripe\Service\Radar\ValueListService
 */
final class ValueListServiceTest extends \Erikwang2013\Stripe\TestCase
{
    use \Erikwang2013\Stripe\TestHelper;

    const TEST_RESOURCE_ID = 'rsl_123';

    /** @var \Erikwang2013\Stripe\StripeClient */
    private $client;

    /** @var ValueListService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \Erikwang2013\Stripe\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        $this->service = new ValueListService($this->client);
    }

    public function testAll()
    {
        $this->expectsRequest(
            'get',
            '/v1/radar/value_lists'
        );
        $resources = $this->service->all();
        self::compatAssertIsArray($resources->data);
        self::assertInstanceOf(\Erikwang2013\Stripe\Radar\ValueList::class, $resources->data[0]);
    }

    public function testCreate()
    {
        $this->expectsRequest(
            'post',
            '/v1/radar/value_lists'
        );
        $resource = $this->service->create([
            'alias' => 'alias',
            'name' => 'name',
        ]);
        self::assertInstanceOf(\Erikwang2013\Stripe\Radar\ValueList::class, $resource);
    }

    public function testDelete()
    {
        $this->expectsRequest(
            'delete',
            '/v1/radar/value_lists/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->delete(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(\Erikwang2013\Stripe\Radar\ValueList::class, $resource);
        self::assertTrue($resource->isDeleted());
    }

    public function testRetrieve()
    {
        $this->expectsRequest(
            'get',
            '/v1/radar/value_lists/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->retrieve(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(\Erikwang2013\Stripe\Radar\ValueList::class, $resource);
    }

    public function testUpdate()
    {
        $this->expectsRequest(
            'post',
            '/v1/radar/value_lists/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->update(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        self::assertInstanceOf(\Erikwang2013\Stripe\Radar\ValueList::class, $resource);
    }
}
