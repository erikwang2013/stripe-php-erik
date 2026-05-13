<?php

// File generated from our OpenAPI spec

namespace Erikwang2013\Stripe\Service\Tax;

/**
 * @phpstan-import-type RequestOptionsArray from \Erikwang2013\Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Erikwang2013\Stripe\Util\RequestOptions
 */
class AssociationService extends \Erikwang2013\Stripe\Service\AbstractService
{
    /**
     * Finds a tax association object by PaymentIntent id.
     *
     * @param null|array{expand?: string[], payment_intent: string} $params
     * @param null|RequestOptionsArray|\Erikwang2013\Stripe\Util\RequestOptions $opts
     *
     * @return \Erikwang2013\Stripe\Tax\Association
     *
     * @throws \Erikwang2013\Stripe\Exception\ApiErrorException if the request fails
     */
    public function find($params = null, $opts = null)
    {
        return $this->request('get', '/v1/tax/associations/find', $params, $opts);
    }
}
