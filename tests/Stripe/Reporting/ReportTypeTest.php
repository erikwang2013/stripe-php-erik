<?php

namespace Erikwang2013\Stripe\Reporting;

/**
 * @internal
 *
 * @covers \Erikwang2013\Stripe\Reporting\ReportType
 */
final class ReportTypeTest extends \Erikwang2013\Stripe\TestCase
{
    use \Erikwang2013\Stripe\TestHelper;

    const TEST_RESOURCE_ID = 'activity.summary.1';

    public function testIsListable()
    {
        $this->expectsRequest(
            'get',
            '/v1/reporting/report_types'
        );
        $resources = ReportType::all();
        self::compatAssertIsArray($resources->data);
        self::assertInstanceOf(ReportType::class, $resources->data[0]);
    }

    public function testIsRetrievable()
    {
        $this->expectsRequest(
            'get',
            '/v1/reporting/report_types/' . self::TEST_RESOURCE_ID
        );
        $resource = ReportType::retrieve(self::TEST_RESOURCE_ID);
        self::assertInstanceOf(ReportType::class, $resource);
    }
}
