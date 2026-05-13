<?php

namespace Erikwang2013\Stripe\Identity;

/**
 * @internal
 *
 * @coversNothing
 */
final class VerificationReportTest extends \Erikwang2013\Stripe\TestCase
{
    use \Erikwang2013\Stripe\TestHelper;
    const TEST_RESOURCE_ID = 'vr_123';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/identity/verification_reports'
        );
        $resources = VerificationReport::all();
        self::compatAssertIsArray($resources->data);
        self::assertInstanceOf(VerificationReport::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/identity/verification_reports/' . self::TEST_RESOURCE_ID
        );
        $resource = VerificationReport::retrieve(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(VerificationReport::class, $resource);
    }
}
