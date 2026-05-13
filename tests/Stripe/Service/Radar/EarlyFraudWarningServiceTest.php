<?php

namespace Erikwang2013\Stripe\Service\Radar;

/**
 * @internal
 *
 * @covers \Erikwang2013\Stripe\Service\Radar\EarlyFraudWarningService
 */
final class EarlyFraudWarningServiceTest extends \Erikwang2013\Stripe\TestCase
{
    use \Erikwang2013\Stripe\TestHelper;

    const TEST_RESOURCE_ID = 'issfr_123';

    /** @var \Erikwang2013\Stripe\StripeClient */
    private $client;

    /** @var EarlyFraudWarningService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \Erikwang2013\Stripe\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        $this->service = new EarlyFraudWarningService($this->client);
    }

    public function testAll()
    {
        $this->expectsRequest(
            'get',
            '/v1/radar/early_fraud_warnings'
        );
        $resources = $this->service->all();
        self::compatAssertIsArray($resources->data);
        self::assertInstanceOf(\Erikwang2013\Stripe\Radar\EarlyFraudWarning::class, $resources->data[0]);
    }

    public function testRetrieve()
    {
        $this->expectsRequest(
            'get',
            '/v1/radar/early_fraud_warnings/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->retrieve(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(\Erikwang2013\Stripe\Radar\EarlyFraudWarning::class, $resource);
    }
}
