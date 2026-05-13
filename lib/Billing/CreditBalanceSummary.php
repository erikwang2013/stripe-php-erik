<?php

// File generated from our OpenAPI spec

namespace Erikwang2013\Stripe\Billing;

/**
 * Indicates the billing credit balance for billing credits granted to a customer.
 *
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property ((object{available_balance: (object{monetary: null|(object{currency: string, value: int}&\Erikwang2013\Stripe\StripeObject), type: string}&\Erikwang2013\Stripe\StripeObject), ledger_balance: (object{monetary: null|(object{currency: string, value: int}&\Erikwang2013\Stripe\StripeObject), type: string}&\Erikwang2013\Stripe\StripeObject)}&\Erikwang2013\Stripe\StripeObject))[] $balances The billing credit balances. One entry per credit grant currency. If a customer only has credit grants in a single currency, then this will have a single balance entry.
 * @property string|\Erikwang2013\Stripe\Customer $customer The customer the balance is for.
 * @property null|string $customer_account The account the balance is for.
 * @property bool $livemode If the object exists in live mode, the value is <code>true</code>. If the object exists in test mode, the value is <code>false</code>.
 */
class CreditBalanceSummary extends \Erikwang2013\Stripe\SingletonApiResource
{
    const OBJECT_NAME = 'billing.credit_balance_summary';

    /**
     * Retrieves the credit balance summary for a customer.
     *
     * @param null|array|string $opts
     *
     * @return CreditBalanceSummary
     *
     * @throws \Erikwang2013\Stripe\Exception\ApiErrorException if the request fails
     */
    public static function retrieve($opts = null)
    {
        $opts = \Erikwang2013\Stripe\Util\RequestOptions::parse($opts);
        $instance = new static(null, $opts);
        $instance->refresh();

        return $instance;
    }
}
