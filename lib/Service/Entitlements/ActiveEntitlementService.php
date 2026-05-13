<?php

// File generated from our OpenAPI spec

namespace Erikwang2013\Stripe\Service\Entitlements;

/**
 * @phpstan-import-type RequestOptionsArray from \Erikwang2013\Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Erikwang2013\Stripe\Util\RequestOptions
 */
class ActiveEntitlementService extends \Erikwang2013\Stripe\Service\AbstractService
{
    /**
     * Retrieve a list of active entitlements for a customer.
     *
     * @param null|array{customer: string, ending_before?: string, expand?: string[], limit?: int, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Erikwang2013\Stripe\Util\RequestOptions $opts
     *
     * @return \Erikwang2013\Stripe\Collection<\Erikwang2013\Stripe\Entitlements\ActiveEntitlement>
     *
     * @throws \Erikwang2013\Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/entitlements/active_entitlements', $params, $opts);
    }

    /**
     * Retrieve an active entitlement.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Erikwang2013\Stripe\Util\RequestOptions $opts
     *
     * @return \Erikwang2013\Stripe\Entitlements\ActiveEntitlement
     *
     * @throws \Erikwang2013\Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/entitlements/active_entitlements/%s', $id), $params, $opts);
    }
}
