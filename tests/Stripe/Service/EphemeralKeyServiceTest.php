<?php

namespace Erikwang2013\Stripe\Service;

/**
 * @internal
 *
 * @covers \Erikwang2013\Stripe\Service\EphemeralKeyService
 */
final class EphemeralKeyServiceTest extends \Erikwang2013\Stripe\TestCase
{
    use \Erikwang2013\Stripe\TestHelper;

    const TEST_RESOURCE_ID = 'ek_123';

    /** @var \Erikwang2013\Stripe\StripeClient */
    private $client;

    /** @var EphemeralKeyService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \Erikwang2013\Stripe\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        $this->service = new EphemeralKeyService($this->client);
    }

    public function testCreate()
    {
        $this->expectsRequest(
            'post',
            '/v1/ephemeral_keys',
            null,
            ['Stripe-Version: 2017-05-25']
        );
        $resource = $this->service->create([
            'customer' => 'cus_123',
        ], ['stripe_version' => '2017-05-25']);
        self::assertInstanceOf(\Erikwang2013\Stripe\EphemeralKey::class, $resource);
    }

    public function testCreateWithoutExplicitApiVersion()
    {
        $this->expectException(\InvalidArgumentException::class);

        $resource = $this->service->create([
            'customer' => 'cus_123',
        ]);
    }

    public function testDelete()
    {
        $this->expectsRequest(
            'delete',
            '/v1/ephemeral_keys/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->delete(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(\Erikwang2013\Stripe\EphemeralKey::class, $resource);
    }
}
