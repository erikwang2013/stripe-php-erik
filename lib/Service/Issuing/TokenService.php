<?php

// File generated from our OpenAPI spec

namespace Erikwang2013\Stripe\Service\Issuing;

/**
 * @phpstan-import-type RequestOptionsArray from \Erikwang2013\Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Erikwang2013\Stripe\Util\RequestOptions
 */
class TokenService extends \Erikwang2013\Stripe\Service\AbstractService
{
    /**
     * Lists all Issuing <code>Token</code> objects for a given card.
     *
     * @param null|array{card: string, created?: array|int, ending_before?: string, expand?: string[], limit?: int, starting_after?: string, status?: string} $params
     * @param null|RequestOptionsArray|\Erikwang2013\Stripe\Util\RequestOptions $opts
     *
     * @return \Erikwang2013\Stripe\Collection<\Erikwang2013\Stripe\Issuing\Token>
     *
     * @throws \Erikwang2013\Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/issuing/tokens', $params, $opts);
    }

    /**
     * Retrieves an Issuing <code>Token</code> object.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Erikwang2013\Stripe\Util\RequestOptions $opts
     *
     * @return \Erikwang2013\Stripe\Issuing\Token
     *
     * @throws \Erikwang2013\Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($id, $params = null, $opts = null)
    {
        return $this->request('get', $this->buildPath('/v1/issuing/tokens/%s', $id), $params, $opts);
    }

    /**
     * Attempts to update the specified Issuing <code>Token</code> object to the status
     * specified.
     *
     * @param string $id
     * @param null|array{expand?: string[], status: string} $params
     * @param null|RequestOptionsArray|\Erikwang2013\Stripe\Util\RequestOptions $opts
     *
     * @return \Erikwang2013\Stripe\Issuing\Token
     *
     * @throws \Erikwang2013\Stripe\Exception\ApiErrorException if the request fails
     */
    public function update($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/issuing/tokens/%s', $id), $params, $opts);
    }
}
