<?php

namespace Erikwang2013\Stripe\Issuing;

/**
 * @internal
 *
 * @covers \Erikwang2013\Stripe\Issuing\Dispute
 */
final class DisputeTest extends \Erikwang2013\Stripe\TestCase
{
    use \Erikwang2013\Stripe\TestHelper;

    const TEST_RESOURCE_ID = 'idp_123';

    public function testIsCreatable()
    {
        $params = [
            'transaction' => 'ipi_123',
        ];

        $this->expectsRequest(
            'post',
            '/v1/issuing/disputes',
            $params
        );
        $resource = Dispute::create($params);
        self::assertInstanceOf(Dispute::class, $resource);
    }

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/issuing/disputes'
        );
        $resources = Dispute::all();
        self::compatAssertIsArray($resources->data);
        self::assertInstanceOf(Dispute::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/issuing/disputes/' . self::TEST_RESOURCE_ID
        );
        $resource = Dispute::retrieve(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(Dispute::class, $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/issuing/disputes/' . self::TEST_RESOURCE_ID,
            []
        );
        $resource = Dispute::update(self::TEST_RESOURCE_ID, []);
        self::assertInstanceOf(Dispute::class, $resource);
    }

    public function testIsSubmittable()
    {
        $resource = Dispute::retrieve(self::TEST_RESOURCE_ID);
        $this->expectsRequest(
            'post',
            '/v1/issuing/disputes/' . self::TEST_RESOURCE_ID . '/submit'
        );
        $resource->submit();
        self::assertInstanceOf(Dispute::class, $resource);
    }
}
