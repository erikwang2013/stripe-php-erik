<?php

namespace Erikwang2013\Stripe\Service\Issuing;

/**
 * @internal
 *
 * @covers \Erikwang2013\Stripe\Service\Issuing\AuthorizationService
 */
final class AuthorizationServiceTest extends \Erikwang2013\Stripe\TestCase
{
    use \Erikwang2013\Stripe\TestHelper;

    const TEST_RESOURCE_ID = 'iauth_123';

    /** @var \Erikwang2013\Stripe\StripeClient */
    private $client;

    /** @var AuthorizationService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \Erikwang2013\Stripe\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        $this->service = new AuthorizationService($this->client);
    }

    public function testAll()
    {
        $this->expectsRequest(
            'get',
            '/v1/issuing/authorizations'
        );
        $resources = $this->service->all();
        self::compatAssertIsArray($resources->data);
        self::assertInstanceOf(\Erikwang2013\Stripe\Issuing\Authorization::class, $resources->data[0]);
    }

    public function testApprove()
    {
        $this->expectsRequest(
            'post',
            '/v1/issuing/authorizations/' . self::TEST_RESOURCE_ID . '/approve'
        );
        $resource = $this->service->approve(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(\Erikwang2013\Stripe\Issuing\Authorization::class, $resource);
    }

    public function testDecline()
    {
        $this->expectsRequest(
            'post',
            '/v1/issuing/authorizations/' . self::TEST_RESOURCE_ID . '/decline'
        );
        $resource = $this->service->decline(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(\Erikwang2013\Stripe\Issuing\Authorization::class, $resource);
    }

    public function testRetrieve()
    {
        $this->expectsRequest(
            'get',
            '/v1/issuing/authorizations/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->retrieve(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(\Erikwang2013\Stripe\Issuing\Authorization::class, $resource);
    }

    public function testUpdate()
    {
        $this->expectsRequest(
            'post',
            '/v1/issuing/authorizations/' . self::TEST_RESOURCE_ID,
            ['metadata' => ['key' => 'value']]
        );
        $resource = $this->service->update(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        self::assertInstanceOf(\Erikwang2013\Stripe\Issuing\Authorization::class, $resource);
    }
}
