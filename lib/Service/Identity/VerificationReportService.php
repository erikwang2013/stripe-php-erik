<?php

// File generated from our OpenAPI spec

namespace Erikwang2013\Stripe\Service\Identity;

/**
 * @phpstan-import-type RequestOptionsArray from \Erikwang2013\Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Erikwang2013\Stripe\Util\RequestOptions
 */
class VerificationReportService extends \Erikwang2013\Stripe\Service\AbstractService
{
    /**
     * List all verification reports.
     *
     * @param null|array{client_reference_id?: string, created?: array|int, ending_before?: string, expand?: string[], limit?: int, starting_after?: string, type?: string, verification_session?: string} $params
     * @param null|RequestOptionsArray|\Erikwang2013\Stripe\Util\RequestOptions $opts
     *
     * @return \Erikwang2013\Stripe\Collection<\Erikwang2013\Stripe\Identity\VerificationReport>
     *
     * @throws \Erikwang2013\Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/identity/verification_reports', $params, $opts);
    }

    /**
     * Retrieves an existing VerificationReport.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Erikwang2013\Stripe\Util\RequestOptions $opts
     *
     * @return \Erikwang2013\Stripe\Identity\VerificationReport
     *
     * @throws \Erikwang2013\Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/identity/verification_reports/%s', $id), $params, $opts);
    }
}
