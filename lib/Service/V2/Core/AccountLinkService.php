<?php

// File generated from our OpenAPI spec

namespace Erikwang2013\Stripe\Service\V2\Core;

/**
 * @phpstan-import-type RequestOptionsArray from \Erikwang2013\Stripe\Util\RequestOptions
 *
 * @psalm-import-type RequestOptionsArray from \Erikwang2013\Stripe\Util\RequestOptions
 */
class AccountLinkService extends \Erikwang2013\Stripe\Service\AbstractService
{
    /**
     * Creates an AccountLink object that includes a single-use URL that an account can
     * use to access a Stripe-hosted flow for collecting or updating required
     * information.
     *
     * @param null|array{account: string, use_case: array{account_onboarding?: array{collection_options?: array{fields?: string, future_requirements?: string}, configurations: string[], refresh_url: string, return_url?: string}, account_update?: array{collection_options?: array{fields?: string, future_requirements?: string}, configurations: string[], refresh_url: string, return_url?: string}, type: string}} $params
     * @param null|RequestOptionsArray|\Erikwang2013\Stripe\Util\RequestOptions $opts
     *
     * @return \Erikwang2013\Stripe\V2\Core\AccountLink
     *
     * @throws \Erikwang2013\Stripe\Exception\RateLimitException
     */
    public function create($params = null, $opts = null)
    {
        return $this->request('post', '/v2/core/account_links', $params, $opts);
    }
}
