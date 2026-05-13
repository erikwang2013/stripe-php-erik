<?php

namespace Erikwang2013\Stripe\Exception\OAuth;

/**
 * Implements properties and methods common to all (non-SPL) Stripe OAuth
 * exceptions.
 */
abstract class OAuthErrorException extends \Erikwang2013\Stripe\Exception\ApiErrorException
{
    protected function constructErrorObject()
    {
        if (null === $this->jsonBody) {
            return null;
        }

        return \Erikwang2013\Stripe\OAuthErrorObject::constructFrom($this->jsonBody);
    }
}
