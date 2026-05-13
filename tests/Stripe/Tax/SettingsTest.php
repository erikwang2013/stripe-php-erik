<?php

namespace Erikwang2013\Stripe\Tax;

/**
 * @internal
 *
 * @covers \Erikwang2013\Stripe\Terminal\ConnectionToken
 */
final class SettingsTest extends \Erikwang2013\Stripe\TestCase
{
    use \Erikwang2013\Stripe\TestHelper;

    public function testIsUpdateable()
    {
        $this->expectsRequest(
            'post',
            '/v1/tax/settings'
        );
        $resource = Settings::update([
            'defaults' => [
                'tax_behavior' => 'exclusive',
            ],
        ]);
        self::assertInstanceOf(Settings::class, $resource);
    }
}
