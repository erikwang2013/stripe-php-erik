<?php

// File generated from our OpenAPI spec

namespace Erikwang2013\Stripe\Events;

/**
 * @property \Erikwang2013\Stripe\RelatedObject $related_object Object containing the reference to API resource relevant to the event
 */
class V2CoreAccountIncludingFutureRequirementsUpdatedEventNotification extends \Erikwang2013\Stripe\V2\Core\EventNotification
{
    const LOOKUP_TYPE = 'v2.core.account[future_requirements].updated';
    public $related_object;

    /**
     * Retrieves the full event object from the API. Make an API request on every call.
     *
     * @return V2CoreAccountIncludingFutureRequirementsUpdatedEvent
     *
     * @throws \Erikwang2013\Stripe\Exception\ApiErrorException if the request fails
     */
    public function fetchEvent()
    {
        return parent::fetchEvent();
    }

    /**
     * Retrieves the related object from the API. Make an API request on every call.
     *
     * @return \Erikwang2013\Stripe\V2\Core\Account
     *
     * @throws \Erikwang2013\Stripe\Exception\ApiErrorException if the request fails
     */
    public function fetchRelatedObject()
    {
        return parent::fetchRelatedObject();
    }
}
