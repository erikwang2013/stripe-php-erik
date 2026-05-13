<?php

// File generated from our OpenAPI spec

namespace Erikwang2013\Stripe\Events;

/**
 * @property \Erikwang2013\Stripe\RelatedObject $related_object Object containing the reference to API resource relevant to the event
 */
class V2CoreAccountIncludingFutureRequirementsUpdatedEvent extends \Erikwang2013\Stripe\V2\Core\Event
{
    const LOOKUP_TYPE = 'v2.core.account[future_requirements].updated';

    /**
     * Retrieves the related object from the API. Make an API request on every call.
     *
     * @return \Erikwang2013\Stripe\V2\Core\Account
     *
     * @throws \Erikwang2013\Stripe\Exception\ApiErrorException if the request fails
     */
    public function fetchRelatedObject()
    {
        $apiMode = \Erikwang2013\Stripe\Util\Util::getApiMode($this->related_object->url);
        list($object, $options) = $this->_request('get', $this->related_object->url, [], [
            'stripe_context' => $this->context,
            'headers' => ['Stripe-Request-Trigger' => 'event=' . $this->id],
        ], [], $apiMode);

        return \Erikwang2013\Stripe\Util\Util::convertToStripeObject($object, $options, $apiMode);
    }
}
