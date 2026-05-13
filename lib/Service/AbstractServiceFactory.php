<?php

namespace Erikwang2013\Stripe\Service;

/**
 * Abstract base class for all service factories used to expose service
 * instances through {@link \Erikwang2013\Stripe\StripeClient}.
 *
 * Service factories serve two purposes:
 *
 * 1. Expose properties for all services through the `__get()` magic method.
 * 2. Lazily initialize each service instance the first time the property for
 *    a given service is used.
 */
abstract class AbstractServiceFactory
{
    use ServiceNavigatorTrait;

    /**
     * @param \Erikwang2013\Stripe\StripeClientInterface $client
     */
    public function __construct($client)
    {
        $this->client = $client;
    }
}
