<?php

// File generated from our OpenAPI spec

namespace Erikwang2013\Stripe\Service;

/**
 * @phpstan-import-type RequestOptionsArray from \Erikwang2013\Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Erikwang2013\Stripe\Util\RequestOptions
 */
class SetupAttemptService extends AbstractService
{
    /**
     * Returns a list of SetupAttempts that associate with a provided SetupIntent.
     *
     * @param null|array{created?: array|int, ending_before?: string, expand?: string[], limit?: int, setup_intent: string, starting_after?: string} $params
     * @param null|RequestOptionsArray|\Erikwang2013\Stripe\Util\RequestOptions $opts
     *
     * @return \Erikwang2013\Stripe\Collection<\Erikwang2013\Stripe\SetupAttempt>
     *
     * @throws \Erikwang2013\Stripe\Exception\ApiErrorException if the request fails
     */
    public function all($params = null, $opts = null)
    {
        return $this->requestCollection('get', '/v1/setup_attempts', $params, $opts);
    }
}
