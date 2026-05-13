<?php

namespace Erikwang2013\Stripe\Service\Issuing;

/**
 * @internal
 *
 * @covers \Erikwang2013\Stripe\Service\Issuing\CardholderService
 */
final class CardholderServiceTest extends \Erikwang2013\Stripe\TestCase
{
    use \Erikwang2013\Stripe\TestHelper;

    const TEST_RESOURCE_ID = 'ich_123';

    /** @var \Erikwang2013\Stripe\StripeClient */
    private $client;

    /** @var CardholderService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \Erikwang2013\Stripe\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        $this->service = new CardholderService($this->client);
    }

    public function testAll()
    {
        $this->expectsRequest(
            'get',
            '/v1/issuing/cardholders'
        );
        $resources = $this->service->all();
        self::compatAssertIsArray($resources->data);
        self::assertInstanceOf(\Erikwang2013\Stripe\Issuing\Cardholder::class, $resources->data[0]);
    }

    public function testCreate()
    {
        $params = [
            'billing' => [
                'address' => [
                    'city' => 'city',
                    'country' => 'US',
                    'line1' => 'line1',
                    'postal_code' => 'postal_code',
                ],
            ],
            'name' => 'Cardholder Name',
            'type' => 'individual',
        ];

        $this->expectsRequest(
            'post',
            '/v1/issuing/cardholders',
            $params
        );
        $resource = $this->service->create($params);
        self::assertInstanceOf(\Erikwang2013\Stripe\Issuing\Cardholder::class, $resource);
    }

    public function testRetrieve()
    {
        $this->expectsRequest(
            'get',
            '/v1/issuing/cardholders/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->retrieve(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(\Erikwang2013\Stripe\Issuing\Cardholder::class, $resource);
    }

    public function testUpdate()
    {
        $this->expectsRequest(
            'post',
            '/v1/issuing/cardholders/' . self::TEST_RESOURCE_ID,
            ['metadata' => ['key' => 'value']]
        );
        $resource = $this->service->update(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        self::assertInstanceOf(\Erikwang2013\Stripe\Issuing\Cardholder::class, $resource);
    }
}
