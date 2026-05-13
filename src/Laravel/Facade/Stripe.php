<?php

/**
 * Stripe Laravel Facade 门面
 *
 * 用法 / Usage:
 *   \Stripe\Laravel\Facade\Stripe::customers()->create([...]);
 *
 * @method static \Stripe\Service\AccountLinkService accountLinks()
 * @method static \Stripe\Service\AccountService accounts()
 * @method static \Stripe\Service\AccountSessionService accountSessions()
 * @method static \Stripe\Service\BalanceService balance()
 * @method static \Stripe\Service\ChargeService charges()
 * @method static \Stripe\Service\Checkout\CheckoutServiceFactory checkout()
 * @method static \Stripe\Service\CouponService coupons()
 * @method static \Stripe\Service\CustomerService customers()
 * @method static \Stripe\Service\DisputeService disputes()
 * @method static \Stripe\Service\EventService events()
 * @method static \Stripe\Service\InvoiceService invoices()
 * @method static \Stripe\Service\InvoiceItemService invoiceItems()
 * @method static \Stripe\Service\MandateService mandates()
 * @method static \Stripe\Service\PaymentIntentService paymentIntents()
 * @method static \Stripe\Service\PaymentLinkService paymentLinks()
 * @method static \Stripe\Service\PaymentMethodService paymentMethods()
 * @method static \Stripe\Service\PayoutService payouts()
 * @method static \Stripe\Service\PlanService plans()
 * @method static \Stripe\Service\PriceService prices()
 * @method static \Stripe\Service\ProductService products()
 * @method static \Stripe\Service\RefundService refunds()
 * @method static \Stripe\Service\SetupIntentService setupIntents()
 * @method static \Stripe\Service\SourceService sources()
 * @method static \Stripe\Service\SubscriptionService subscriptions()
 * @method static \Stripe\Service\SubscriptionScheduleService subscriptionSchedules()
 * @method static \Stripe\Service\TokenService tokens()
 * @method static \Stripe\Service\TopupService topups()
 * @method static \Stripe\Service\TransferService transfers()
 * @method static \Stripe\Service\WebhookEndpointService webhookEndpoints()
 * @method static \Stripe\StripeObject deserialize(string $json)
 * @method static \Stripe\ApiResponse rawRequest(string $method, string $url, ?array $params = null, array $opts = [])
 *
 * @see \Stripe\StripeClient
 */
namespace Stripe\Laravel\Facade;

use Illuminate\Support\Facades\Facade;

class Stripe extends Facade
{
    /**
     * Get the registered name of the component.
     * 获取组件在容器中的注册名称
     */
    protected static function getFacadeAccessor()
    {
        return \Stripe\StripeClient::class;
    }
}
