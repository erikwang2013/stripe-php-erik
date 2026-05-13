<?php

// File generated from our OpenAPI spec

namespace Erikwang2013\Stripe\Events;

/**
 * @property \Erikwang2013\Stripe\RelatedObject $related_object Object containing the reference to API resource relevant to the event
 */
class V1BillingMeterErrorReportTriggeredEventNotification extends \Erikwang2013\Stripe\V2\Core\EventNotification
{
    const LOOKUP_TYPE = 'v1.billing.meter.error_report_triggered';
    public $related_object;

    /**
     * Retrieves the full event object from the API. Make an API request on every call.
     *
     * @return V1BillingMeterErrorReportTriggeredEvent
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
     * @return \Erikwang2013\Stripe\Billing\Meter
     *
     * @throws \Erikwang2013\Stripe\Exception\ApiErrorException if the request fails
     */
    public function fetchRelatedObject()
    {
        return parent::fetchRelatedObject();
    }
}
