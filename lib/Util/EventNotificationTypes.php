<?php

namespace Erikwang2013\Stripe\Util;

class EventNotificationTypes
{
    const v2EventMapping = [
        // The beginning of the section generated from our OpenAPI spec
        \Erikwang2013\Stripe\Events\V1BillingMeterErrorReportTriggeredEventNotification::LOOKUP_TYPE => \Erikwang2013\Stripe\Events\V1BillingMeterErrorReportTriggeredEventNotification::class,
        \Erikwang2013\Stripe\Events\V1BillingMeterNoMeterFoundEventNotification::LOOKUP_TYPE => \Erikwang2013\Stripe\Events\V1BillingMeterNoMeterFoundEventNotification::class,
        \Erikwang2013\Stripe\Events\V2CoreAccountClosedEventNotification::LOOKUP_TYPE => \Erikwang2013\Stripe\Events\V2CoreAccountClosedEventNotification::class,
        \Erikwang2013\Stripe\Events\V2CoreAccountCreatedEventNotification::LOOKUP_TYPE => \Erikwang2013\Stripe\Events\V2CoreAccountCreatedEventNotification::class,
        \Erikwang2013\Stripe\Events\V2CoreAccountUpdatedEventNotification::LOOKUP_TYPE => \Erikwang2013\Stripe\Events\V2CoreAccountUpdatedEventNotification::class,
        \Erikwang2013\Stripe\Events\V2CoreAccountIncludingConfigurationCustomerCapabilityStatusUpdatedEventNotification::LOOKUP_TYPE => \Erikwang2013\Stripe\Events\V2CoreAccountIncludingConfigurationCustomerCapabilityStatusUpdatedEventNotification::class,
        \Erikwang2013\Stripe\Events\V2CoreAccountIncludingConfigurationCustomerUpdatedEventNotification::LOOKUP_TYPE => \Erikwang2013\Stripe\Events\V2CoreAccountIncludingConfigurationCustomerUpdatedEventNotification::class,
        \Erikwang2013\Stripe\Events\V2CoreAccountIncludingConfigurationMerchantCapabilityStatusUpdatedEventNotification::LOOKUP_TYPE => \Erikwang2013\Stripe\Events\V2CoreAccountIncludingConfigurationMerchantCapabilityStatusUpdatedEventNotification::class,
        \Erikwang2013\Stripe\Events\V2CoreAccountIncludingConfigurationMerchantUpdatedEventNotification::LOOKUP_TYPE => \Erikwang2013\Stripe\Events\V2CoreAccountIncludingConfigurationMerchantUpdatedEventNotification::class,
        \Erikwang2013\Stripe\Events\V2CoreAccountIncludingConfigurationRecipientCapabilityStatusUpdatedEventNotification::LOOKUP_TYPE => \Erikwang2013\Stripe\Events\V2CoreAccountIncludingConfigurationRecipientCapabilityStatusUpdatedEventNotification::class,
        \Erikwang2013\Stripe\Events\V2CoreAccountIncludingConfigurationRecipientUpdatedEventNotification::LOOKUP_TYPE => \Erikwang2013\Stripe\Events\V2CoreAccountIncludingConfigurationRecipientUpdatedEventNotification::class,
        \Erikwang2013\Stripe\Events\V2CoreAccountIncludingDefaultsUpdatedEventNotification::LOOKUP_TYPE => \Erikwang2013\Stripe\Events\V2CoreAccountIncludingDefaultsUpdatedEventNotification::class,
        \Erikwang2013\Stripe\Events\V2CoreAccountIncludingFutureRequirementsUpdatedEventNotification::LOOKUP_TYPE => \Erikwang2013\Stripe\Events\V2CoreAccountIncludingFutureRequirementsUpdatedEventNotification::class,
        \Erikwang2013\Stripe\Events\V2CoreAccountIncludingIdentityUpdatedEventNotification::LOOKUP_TYPE => \Erikwang2013\Stripe\Events\V2CoreAccountIncludingIdentityUpdatedEventNotification::class,
        \Erikwang2013\Stripe\Events\V2CoreAccountIncludingRequirementsUpdatedEventNotification::LOOKUP_TYPE => \Erikwang2013\Stripe\Events\V2CoreAccountIncludingRequirementsUpdatedEventNotification::class,
        \Erikwang2013\Stripe\Events\V2CoreAccountLinkReturnedEventNotification::LOOKUP_TYPE => \Erikwang2013\Stripe\Events\V2CoreAccountLinkReturnedEventNotification::class,
        \Erikwang2013\Stripe\Events\V2CoreAccountPersonCreatedEventNotification::LOOKUP_TYPE => \Erikwang2013\Stripe\Events\V2CoreAccountPersonCreatedEventNotification::class,
        \Erikwang2013\Stripe\Events\V2CoreAccountPersonDeletedEventNotification::LOOKUP_TYPE => \Erikwang2013\Stripe\Events\V2CoreAccountPersonDeletedEventNotification::class,
        \Erikwang2013\Stripe\Events\V2CoreAccountPersonUpdatedEventNotification::LOOKUP_TYPE => \Erikwang2013\Stripe\Events\V2CoreAccountPersonUpdatedEventNotification::class,
        \Erikwang2013\Stripe\Events\V2CoreEventDestinationPingEventNotification::LOOKUP_TYPE => \Erikwang2013\Stripe\Events\V2CoreEventDestinationPingEventNotification::class,
        // The end of the section generated from our OpenAPI spec
    ];
}
