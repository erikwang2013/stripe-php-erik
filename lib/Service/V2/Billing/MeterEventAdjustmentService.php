<?php

// File generated from our OpenAPI spec

namespace Erikwang2013\Stripe\Service\V2\Billing;

/**
 * @phpstan-import-type RequestOptionsArray from \Erikwang2013\Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Erikwang2013\Stripe\Util\RequestOptions
 */
class MeterEventAdjustmentService extends \Erikwang2013\Stripe\Service\AbstractService
{
    /**
     * Creates a meter event adjustment to cancel a previously sent meter event.
     *
     * @param null|array{cancel: array{identifier: string}, event_name: string, type: string} $params
     * @param null|RequestOptionsArray|\Erikwang2013\Stripe\Util\RequestOptions $opts
     *
     * @return \Erikwang2013\Stripe\V2\Billing\MeterEventAdjustment
     *
     * @throws \Erikwang2013\Stripe\Exception\ApiErrorException if the request fails
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/billing/meter_event_adjustments', $params, $opts);
    }
}
