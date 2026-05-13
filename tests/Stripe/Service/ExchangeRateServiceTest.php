<?php

namespace Erikwang2013\Stripe\Service;

/**
 * @internal
 *
 * @covers \Erikwang2013\Stripe\Service\ExchangeRateService
 */
final class ExchangeRateServiceTest extends \Erikwang2013\Stripe\TestCase
{
    use \Erikwang2013\Stripe\TestHelper;

    /** @var \Erikwang2013\Stripe\StripeClient */
    private $client;

    /** @var ExchangeRateService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \Erikwang2013\Stripe\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        $this->service = new ExchangeRateService($this->client);
    }

    public function testAll()
    {
        $resources = $this->service->all();
        self::compatAssertIsArray($resources->data);
        self::assertInstanceOf(\Erikwang2013\Stripe\ExchangeRate::class, $resources->data[0]);
    }

    public function testRetrieve()
    {
        $resource = $this->service->retrieve('usd');
        self::assertInstanceOf(\Erikwang2013\Stripe\ExchangeRate::class, $resource);
    }
}
