<?php

namespace Erikwang2013\Stripe\Service;

/**
 * @internal
 *
 * @covers \Erikwang2013\Stripe\Service\AccountLinkService
 */
final class AccountLinkServiceTest extends \Erikwang2013\Stripe\TestCase
{
    use \Erikwang2013\Stripe\TestHelper;

    /** @var \Erikwang2013\Stripe\StripeClient */
    private $client;

    /** @var AccountLinkService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \Erikwang2013\Stripe\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        $this->service = new AccountLinkService($this->client);
    }

    public function testCreate()
    {
        $this->expectsRequest(
            'post',
            '/v1/account_links'
        );
        $resource = $this->service->create([
            'account' => 'acct_123',
            'refresh_url' => 'https://stripe.com/refresh_url',
            'return_url' => 'https://stripe.com/return_url',
            'type' => 'account_onboarding',
        ]);
        self::assertInstanceOf(\Erikwang2013\Stripe\AccountLink::class, $resource);
    }
}
