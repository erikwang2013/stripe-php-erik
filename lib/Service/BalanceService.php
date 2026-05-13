<?php

// File generated from our OpenAPI spec

namespace Erikwang2013\Stripe\Service;

/**
 * @phpstan-import-type RequestOptionsArray from \Erikwang2013\Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Erikwang2013\Stripe\Util\RequestOptions
 */
class BalanceService extends AbstractService
{
    /**
     * Retrieves the current account balance, based on the authentication that was used
     * to make the request.  For a sample request, see <a
     * href="/docs/connect/account-balances#accounting-for-negative-balances">Accounting
     * for negative balances</a>.
     *
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Erikwang2013\Stripe\Util\RequestOptions $opts
     *
     * @return \Erikwang2013\Stripe\Balance
     *
     * @throws \Erikwang2013\Stripe\Exception\ApiErrorException if the request fails
     */
    public function retrieve($params = null, $opts = null)
    {
        return $this->request('get', '/v1/balance', $params, $opts);
    }
}
