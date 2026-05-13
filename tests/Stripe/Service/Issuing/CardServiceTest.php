<?php

namespace Erikwang2013\Stripe\Service\Issuing;

/**
 * @internal
 *
 * @covers \Erikwang2013\Stripe\Service\Issuing\CardService
 */
final class CardServiceTest extends \Erikwang2013\Stripe\TestCase
{
    use \Erikwang2013\Stripe\TestHelper;

    const TEST_RESOURCE_ID = 'ic_123';

    /** @var \Erikwang2013\Stripe\StripeClient */
    private $client;

    /** @var CardService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \Erikwang2013\Stripe\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        $this->service = new CardService($this->client);
    }

    public function testAll()
    {
        $this->expectsRequest(
            'get',
            '/v1/issuing/cards'
        );
        $resources = $this->service->all();
        self::compatAssertIsArray($resources->data);
        self::assertInstanceOf(\Erikwang2013\Stripe\Issuing\Card::class, $resources->data[0]);
    }

    public function testCreate()
    {
        $this->expectsRequest(
            'post',
            '/v1/issuing/cards'
        );
        $resource = $this->service->create([
            'currency' => 'usd',
            'type' => 'physical',
        ]);
        self::assertInstanceOf(\Erikwang2013\Stripe\Issuing\Card::class, $resource);
    }

    public function testRetrieve()
    {
        $this->expectsRequest(
            'get',
            '/v1/issuing/cards/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->retrieve(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(\Erikwang2013\Stripe\Issuing\Card::class, $resource);
    }

    public function testUpdate()
    {
        $this->expectsRequest(
            'post',
            '/v1/issuing/cards/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->update(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        self::assertInstanceOf(\Erikwang2013\Stripe\Issuing\Card::class, $resource);
    }
}
