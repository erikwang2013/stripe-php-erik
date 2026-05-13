<?php

// File generated from our OpenAPI spec

namespace Erikwang2013\Stripe\Service\Reporting;

/**
 * @phpstan-import-type RequestOptionsArray from \Erikwang2013\Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Erikwang2013\Stripe\Util\RequestOptions
 */
class ReportTypeService extends \Erikwang2013\Stripe\Service\AbstractService
{
    /**
     * Returns a full list of Report Types.
     *
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Erikwang2013\Stripe\Util\RequestOptions $opts
     *
     * @return \Erikwang2013\Stripe\Collection<\Erikwang2013\Stripe\Reporting\ReportType>
     *
     * @throws \Erikwang2013\Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/reporting/report_types', $params, $opts);
    }

    /**
     * Retrieves the details of a Report Type. (Certain report types require a <a
     * href="https://stripe.com/docs/keys#test-live-modes">live-mode API key</a>.).
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Erikwang2013\Stripe\Util\RequestOptions $opts
     *
     * @return \Erikwang2013\Stripe\Reporting\ReportType
     *
     * @throws \Erikwang2013\Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/reporting/report_types/%s', $id), $params, $opts);
    }
}
