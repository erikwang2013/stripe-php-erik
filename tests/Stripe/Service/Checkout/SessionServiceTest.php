<?php

namespace Erikwang2013\Stripe\Service\Checkout;

/**
 * @internal
 *
 * @covers \Erikwang2013\Stripe\Service\Checkout\SessionService
 */
final class SessionServiceTest extends \Erikwang2013\Stripe\TestCase
{
    use \Erikwang2013\Stripe\TestHelper;

    const TEST_RESOURCE_ID = 'cs_123';

    /** @var \Erikwang2013\Stripe\StripeClient */
    private $client;

    /** @var SessionService */
    private $service;

    /**
     * @before
     */
    protected function setUpService()
    {
        $this->client = new \Erikwang2013\Stripe\StripeClient(['api_key' => 'sk_test_123', 'api_base' => MOCK_URL]);
        $this->service = new SessionService($this->client);
    }

    public function testAll()
    {
        $this->expectsRequest(
            'get',
            '/v1/checkout/sessions'
        );
        $resources = $this->service->all();
        self::compatAssertIsArray($resources->data);
        self::assertInstanceOf(\Erikwang2013\Stripe\Checkout\Session::class, $resources->data[0]);
    }

    public function testCreate()
    {
        $this->expectsRequest(
            'post',
            '/v1/checkout/sessions'
        );
        $resource = $this->service->create([
            'cancel_url' => 'https://stripe.com/cancel',
            'client_reference_id' => '1234',
            'line_items' => [
                [
                    'amount' => 123,
                    'currency' => 'usd',
                    'description' => 'item 1',
                    'images' => [
                        'https://stripe.com/img1',
                    ],
                    'name' => 'name',
                    'quantity' => 2,
                ],
            ],
            'payment_intent_data' => [
                'receipt_email' => 'test@stripe.com',
            ],
            'payment_method_types' => ['card'],
            'success_url' => 'https://stripe.com/success',
        ]);
        self::assertInstanceOf(\Erikwang2013\Stripe\Checkout\Session::class, $resource);
    }

    public function testRetrieve()
    {
        $this->expectsRequest(
            'get',
            '/v1/checkout/sessions/' . self::TEST_RESOURCE_ID
        );
        $resource = $this->service->retrieve(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(\Erikwang2013\Stripe\Checkout\Session::class, $resource);
    }
}
