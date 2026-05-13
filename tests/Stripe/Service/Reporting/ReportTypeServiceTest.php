<?php

namespace Erikwang2013\Stripe\Service\Reporting;

/**
 * @internal
 *
 * @covers \Erikwang2013\Stripe\Service\Reporting\ReportTypeService
 */
final class ReportTypeServiceTest extends \Erikwang2013\Stripe\TestCase
{
    use \Erikwang2013\Stripe\TestHelper;

    const TEST_RESOURCE_ID = 'activity.summary.1';

    /** @var \Erikwang2013\Stripe\StripeClient */
    private $client;

    /** @var ReportTypeService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \Erikwang2013\Stripe\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        $this->service = new ReportTypeService($this->client);
    }

    public function testAll()
    {
        $this->expectsRequest(
            'get',
            '/v1/reporting/report_types'
        );
        $resources = $this->service->all();
        self::compatAssertIsArray($resources->data);
        self::assertInstanceOf(\Erikwang2013\Stripe\Reporting\ReportType::class, $resources->data[0]);
    }

    public function testRetrieve()
    {
        $this->expectsRequest(
            'get',
            '/v1/reporting/report_types/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->retrieve(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(\Erikwang2013\Stripe\Reporting\ReportType::class, $resource);
    }
}
