<?php

namespace Erikwang2013\Stripe\Service\Sigma;

/**
 * @internal
 *
 * @covers \Erikwang2013\Stripe\Service\Sigma\ScheduledQueryRunService
 */
final class ScheduledQueryRunServiceTest extends \Erikwang2013\Stripe\TestCase
{
    use \Erikwang2013\Stripe\TestHelper;

    const TEST_RESOURCE_ID = 'sqr_123';

    /** @var \Erikwang2013\Stripe\StripeClient */
    private $client;

    /** @var ScheduledQueryRunService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \Erikwang2013\Stripe\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        $this->service = new ScheduledQueryRunService($this->client);
    }

    public function testAll()
    {
        $this->expectsRequest(
            'get',
            '/v1/sigma/scheduled_query_runs'
        );
        $resources = $this->service->all();
        self::compatAssertIsArray($resources->data);
        self::assertInstanceOf(\Erikwang2013\Stripe\Sigma\ScheduledQueryRun::class, $resources->data[0]);
    }

    public function testRetrieve()
    {
        $this->expectsRequest(
            'get',
            '/v1/sigma/scheduled_query_runs/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->retrieve(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(\Erikwang2013\Stripe\Sigma\ScheduledQueryRun::class, $resource);
    }
}
