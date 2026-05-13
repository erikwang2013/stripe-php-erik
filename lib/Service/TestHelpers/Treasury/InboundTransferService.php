<?php

// File generated from our OpenAPI spec

namespace Erikwang2013\Stripe\Service\TestHelpers\Treasury;

/**
 * @phpstan-import-type RequestOptionsArray from \Erikwang2013\Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Erikwang2013\Stripe\Util\RequestOptions
 */
class InboundTransferService extends \Erikwang2013\Stripe\Service\AbstractService
{
    /**
     * Transitions a test mode created InboundTransfer to the <code>failed</code>
     * status. The InboundTransfer must already be in the <code>processing</code>
     * state.
     *
     * @param string $id
     * @param null|array{expand?: string[], failure_details?: array{code?: string}} $params
     * @param null|RequestOptionsArray|\Erikwang2013\Stripe\Util\RequestOptions $opts
     *
     * @return \Erikwang2013\Stripe\Treasury\InboundTransfer
     *
     * @throws \Erikwang2013\Stripe\Exception\ApiErrorException if the request fails
     */
    public function fail($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/test_helpers/treasury/inbound_transfers/%s/fail', $id), $params, $opts);
    }

    /**
     * Marks the test mode InboundTransfer object as returned and links the
     * InboundTransfer to a ReceivedDebit. The InboundTransfer must already be in the
     * <code>succeeded</code> state.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Erikwang2013\Stripe\Util\RequestOptions $opts
     *
     * @return \Erikwang2013\Stripe\Treasury\InboundTransfer
     *
     * @throws \Erikwang2013\Stripe\Exception\ApiErrorException if the request fails
     */
    public function returnInboundTransfer($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/test_helpers/treasury/inbound_transfers/%s/return', $id), $params, $opts);
    }

    /**
     * Transitions a test mode created InboundTransfer to the <code>succeeded</code>
     * status. The InboundTransfer must already be in the <code>processing</code>
     * state.
     *
     * @param string $id
     * @param null|array{expand?: string[]} $params
     * @param null|RequestOptionsArray|\Erikwang2013\Stripe\Util\RequestOptions $opts
     *
     * @return \Erikwang2013\Stripe\Treasury\InboundTransfer
     *
     * @throws \Erikwang2013\Stripe\Exception\ApiErrorException if the request fails
     */
    public function succeed($id, $params = null, $opts = null)
    {
        return $this->request('post', $this->buildPath('/v1/test_helpers/treasury/inbound_transfers/%s/succeed', $id), $params, $opts);
    }
}
