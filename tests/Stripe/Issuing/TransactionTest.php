<?php

namespace Erikwang2013\Stripe\Issuing;

/**
 * @internal
 *
 * @covers \Erikwang2013\Stripe\Issuing\Transaction
 */
final class TransactionTest extends \Erikwang2013\Stripe\TestCase
{
    use \Erikwang2013\Stripe\TestHelper;

    const TEST_RESOURCE_ID = 'ipi_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/issuing/transactions'
        );
        $resources = Transaction::all();
        self::compatAssertIsArray($resources->data);
        self::assertInstanceOf(Transaction::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/issuing/transactions/' . self::TEST_RESOURCE_ID
        );
        $resource = Transaction::retrieve(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(Transaction::class, $resource);
    }

    public function testIsSaveable()
    {
        $resource = Transaction::retrieve(self::TEST_RESOURCE_ID);
        $resource->metadata['key'] = 'value';

        $this->expectsRequest(
            'post',
            '/v1/issuing/transactions/' . self::TEST_RESOURCE_ID
        );
        $resource->save();
        self::assertInstanceOf(Transaction::class, $resource);
    }

    public function testIsUpdatable()
    {
        $this->expectsRequest(
            'post',
            '/v1/issuing/transactions/' . self::TEST_RESOURCE_ID,
            ['metadata' => ['key' => 'value']]
        );
        $resource = Transaction::update(self::TEST_RESOURCE_ID, [
            'metadata' => ['key' => 'value'],
        ]);
        self::assertInstanceOf(Transaction::class, $resource);
    }
}
