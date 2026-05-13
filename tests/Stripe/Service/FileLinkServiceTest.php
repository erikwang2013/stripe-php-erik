<?php

namespace Erikwang2013\Stripe\Service;

/**
 * @internal
 *
 * @covers \Erikwang2013\Stripe\Service\FileLinkService
 */
final class FileLinkServiceTest extends \Erikwang2013\Stripe\TestCase
{
    use \Erikwang2013\Stripe\TestHelper;

    const TEST_RESOURCE_ID = 'link_123';

    /** @var \Erikwang2013\Stripe\StripeClient */
    private $client;

    /** @var FileLinkService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \Erikwang2013\Stripe\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        $this->service = new FileLinkService($this->client);
    }

    public function testAll()
    {
        $this->expectsRequest(
            'get',
            '/v1/file_links'
        );
        $resources = $this->service->all();
        self::compatAssertIsArray($resources->data);
        self::assertInstanceOf(\Erikwang2013\Stripe\FileLink::class, $resources->data[0]);
    }

    public function testCreate()
    {
        $this->expectsRequest(
            'post',
            '/v1/file_links'
        );
        $resource = $this->service->create([
            'file' => 'file_123',
        ]);
        self::assertInstanceOf(\Erikwang2013\Stripe\FileLink::class, $resource);
    }

    public function testRetrieve()
    {
        $this->expectsRequest(
            'get',
            '/v1/file_links/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->retrieve(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(\Erikwang2013\Stripe\FileLink::class, $resource);
    }

    public function testUpdate()
    {
        $this->expectsRequest(
            'post',
            '/v1/file_links/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->update(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        self::assertInstanceOf(\Erikwang2013\Stripe\FileLink::class, $resource);
    }
}
