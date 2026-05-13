<?php

namespace Erikwang2013\Stripe\Service;

/**
 * @internal
 *
 * @covers \Erikwang2013\Stripe\Service\SetupAttemptService
 */
final class SetupAttemptServiceTest extends \Erikwang2013\Stripe\TestCase
{
    use \Erikwang2013\Stripe\TestHelper;

    /** @var \Erikwang2013\Stripe\StripeClient */
    private $client;

    /** @var SetupAttemptService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \Erikwang2013\Stripe\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        $this->service = new SetupAttemptService($this->client);
    }

    public function testAll()
    {
        $this->expectsRequest(
            'get',
            '/v1/setup_attempts'
        );
        $resources = $this->service->all([
            'setup_intent' => 'si_123',
        ]);
        self::compatAssertIsArray($resources->data);
        self::assertInstanceOf(\Erikwang2013\Stripe\SetupAttempt::class, $resources->data[0]);
    }
}
