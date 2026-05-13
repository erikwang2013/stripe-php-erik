<?php

namespace Erikwang2013\Stripe\Service;

/**
 * @internal
 *
 * @covers \Erikwang2013\Stripe\Service\TaxCodeService
 */
final class TaxCodeServiceTest extends \Erikwang2013\Stripe\TestCase
{
    use \Erikwang2013\Stripe\TestHelper;

    const TEST_RESOURCE_ID = 'txcd_123';

    /** @var \Erikwang2013\Stripe\StripeClient */
    private $client;

    /** @var TaxCodeService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \Erikwang2013\Stripe\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        $this->service = new TaxCodeService($this->client);
    }

    public function testAll()
    {
        $this->expectsRequest(
            'get',
            '/v1/tax_codes'
        );
        $resources = $this->service->all();
        self::compatAssertIsArray($resources->data);
        self::assertInstanceOf(\Erikwang2013\Stripe\TaxCode::class, $resources->data[0]);
    }

    public function testRetrieve()
    {
        $this->expectsRequest(
            'get',
            '/v1/tax_codes/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->retrieve(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(\Erikwang2013\Stripe\TaxCode::class, $resource);
    }
}
