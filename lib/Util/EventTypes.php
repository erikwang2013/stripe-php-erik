<?php

namespace Erikwang2013\Stripe\Util;

class EventTypes
{
    const v2EventMapping = [
        // The beginning of the section generated from our OpenAPI spec
        \Erikwang2013\Stripe\Events\V1BillingMeterErrorReportTriggeredEvent::LOOKUP_TYPE => \Erikwang2013\Stripe\Events\V1BillingMeterErrorReportTriggeredEvent::class,
        \Erikwang2013\Stripe\Events\V1BillingMeterNoMeterFoundEvent::LOOKUP_TYPE => \Erikwang2013\Stripe\Events\V1BillingMeterNoMeterFoundEvent::class,
        \Erikwang2013\Stripe\Events\V2CoreAccountClosedEvent::LOOKUP_TYPE => \Erikwang2013\Stripe\Events\V2CoreAccountClosedEvent::class,
        \Erikwang2013\Stripe\Events\V2CoreAccountCreatedEvent::LOOKUP_TYPE => \Erikwang2013\Stripe\Events\V2CoreAccountCreatedEvent::class,
        \Erikwang2013\Stripe\Events\V2CoreAccountUpdatedEvent::LOOKUP_TYPE => \Erikwang2013\Stripe\Events\V2CoreAccountUpdatedEvent::class,
        \Erikwang2013\Stripe\Events\V2CoreAccountIncludingConfigurationCustomerCapabilityStatusUpdatedEvent::LOOKUP_TYPE => \Erikwang2013\Stripe\Events\V2CoreAccountIncludingConfigurationCustomerCapabilityStatusUpdatedEvent::class,
        \Erikwang2013\Stripe\Events\V2CoreAccountIncludingConfigurationCustomerUpdatedEvent::LOOKUP_TYPE => \Erikwang2013\Stripe\Events\V2CoreAccountIncludingConfigurationCustomerUpdatedEvent::class,
        \Erikwang2013\Stripe\Events\V2CoreAccountIncludingConfigurationMerchantCapabilityStatusUpdatedEvent::LOOKUP_TYPE => \Erikwang2013\Stripe\Events\V2CoreAccountIncludingConfigurationMerchantCapabilityStatusUpdatedEvent::class,
        \Erikwang2013\Stripe\Events\V2CoreAccountIncludingConfigurationMerchantUpdatedEvent::LOOKUP_TYPE => \Erikwang2013\Stripe\Events\V2CoreAccountIncludingConfigurationMerchantUpdatedEvent::class,
        \Erikwang2013\Stripe\Events\V2CoreAccountIncludingConfigurationRecipientCapabilityStatusUpdatedEvent::LOOKUP_TYPE => \Erikwang2013\Stripe\Events\V2CoreAccountIncludingConfigurationRecipientCapabilityStatusUpdatedEvent::class,
        \Erikwang2013\Stripe\Events\V2CoreAccountIncludingConfigurationRecipientUpdatedEvent::LOOKUP_TYPE => \Erikwang2013\Stripe\Events\V2CoreAccountIncludingConfigurationRecipientUpdatedEvent::class,
        \Erikwang2013\Stripe\Events\V2CoreAccountIncludingDefaultsUpdatedEvent::LOOKUP_TYPE => \Erikwang2013\Stripe\Events\V2CoreAccountIncludingDefaultsUpdatedEvent::class,
        \Erikwang2013\Stripe\Events\V2CoreAccountIncludingFutureRequirementsUpdatedEvent::LOOKUP_TYPE => \Erikwang2013\Stripe\Events\V2CoreAccountIncludingFutureRequirementsUpdatedEvent::class,
        \Erikwang2013\Stripe\Events\V2CoreAccountIncludingIdentityUpdatedEvent::LOOKUP_TYPE => \Erikwang2013\Stripe\Events\V2CoreAccountIncludingIdentityUpdatedEvent::class,
        \Erikwang2013\Stripe\Events\V2CoreAccountIncludingRequirementsUpdatedEvent::LOOKUP_TYPE => \Erikwang2013\Stripe\Events\V2CoreAccountIncludingRequirementsUpdatedEvent::class,
        \Erikwang2013\Stripe\Events\V2CoreAccountLinkReturnedEvent::LOOKUP_TYPE => \Erikwang2013\Stripe\Events\V2CoreAccountLinkReturnedEvent::class,
        \Erikwang2013\Stripe\Events\V2CoreAccountPersonCreatedEvent::LOOKUP_TYPE => \Erikwang2013\Stripe\Events\V2CoreAccountPersonCreatedEvent::class,
        \Erikwang2013\Stripe\Events\V2CoreAccountPersonDeletedEvent::LOOKUP_TYPE => \Erikwang2013\Stripe\Events\V2CoreAccountPersonDeletedEvent::class,
        \Erikwang2013\Stripe\Events\V2CoreAccountPersonUpdatedEvent::LOOKUP_TYPE => \Erikwang2013\Stripe\Events\V2CoreAccountPersonUpdatedEvent::class,
        \Erikwang2013\Stripe\Events\V2CoreEventDestinationPingEvent::LOOKUP_TYPE => \Erikwang2013\Stripe\Events\V2CoreEventDestinationPingEvent::class,
        // The end of the section generated from our OpenAPI spec
    ];
}
