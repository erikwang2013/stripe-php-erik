<?php

namespace Erikwang2013\Stripe\Service;

/**
 * @internal
 *
 * @covers \Erikwang2013\Stripe\Service\TokenService
 */
final class TokenServiceTest extends \Erikwang2013\Stripe\TestCase
{
    use \Erikwang2013\Stripe\TestHelper;

    const TEST_RESOURCE_ID = 'tok_123';

    /** @var \Erikwang2013\Stripe\StripeClient */
    private $client;

    /** @var TokenService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \Erikwang2013\Stripe\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        $this->service = new TokenService($this->client);
    }

    public function testCreate()
    {
        $this->expectsRequest(
            'post',
            '/v1/tokens'
        );
        $resource = $this->service->create(['card' => 'tok_visa']);
        self::assertInstanceOf(\Erikwang2013\Stripe\Token::class, $resource);
    }

    public function testRetrieve()
    {
        $this->expectsRequest(
            'get',
            '/v1/tokens/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->retrieve(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(\Erikwang2013\Stripe\Token::class, $resource);
    }
}
