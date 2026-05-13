<?php

/**
 * Stripe Laravel Facade 门面
 *
 * 用法 / Usage:
 *   \Erikwang2013\Stripe\Laravel\Facade\Stripe::customers()->create([...]);
 *
 * @method static \Erikwang2013\Stripe\Service\AccountLinkService accountLinks()
 * @method static \Erikwang2013\Stripe\Service\AccountService accounts()
 * @method static \Erikwang2013\Stripe\Service\AccountSessionService accountSessions()
 * @method static \Erikwang2013\Stripe\Service\ApplePayDomainService applePayDomains()
 * @method static \Erikwang2013\Stripe\Service\Apps\AppsServiceFactory apps()
 * @method static \Erikwang2013\Stripe\Service\ApplicationFeeService applicationFees()
 * @method static \Erikwang2013\Stripe\Service\BalanceService balance()
 * @method static \Erikwang2013\Stripe\Service\BalanceTransactionService balanceTransactions()
 * @method static \Erikwang2013\Stripe\Service\Billing\BillingServiceFactory billing()
 * @method static \Erikwang2013\Stripe\Service\BillingPortal\BillingPortalServiceFactory billingPortal()
 * @method static \Erikwang2013\Stripe\Service\ChargeService charges()
 * @method static \Erikwang2013\Stripe\Service\Checkout\CheckoutServiceFactory checkout()
 * @method static \Erikwang2013\Stripe\Service\Climate\ClimateServiceFactory climate()
 * @method static \Erikwang2013\Stripe\Service\ConfirmationTokenService confirmationTokens()
 * @method static \Erikwang2013\Stripe\Service\CountrySpecService countrySpecs()
 * @method static \Erikwang2013\Stripe\Service\CouponService coupons()
 * @method static \Erikwang2013\Stripe\Service\CreditNoteService creditNotes()
 * @method static \Erikwang2013\Stripe\Service\CustomerService customers()
 * @method static \Erikwang2013\Stripe\Service\CustomerSessionService customerSessions()
 * @method static \Erikwang2013\Stripe\Service\DisputeService disputes()
 * @method static \Erikwang2013\Stripe\Service\Entitlements\EntitlementsServiceFactory entitlements()
 * @method static \Erikwang2013\Stripe\Service\EphemeralKeyService ephemeralKeys()
 * @method static \Erikwang2013\Stripe\Service\EventService events()
 * @method static \Erikwang2013\Stripe\Service\ExchangeRateService exchangeRates()
 * @method static \Erikwang2013\Stripe\Service\FileService files()
 * @method static \Erikwang2013\Stripe\Service\FileLinkService fileLinks()
 * @method static \Erikwang2013\Stripe\Service\FinancialConnections\FinancialConnectionsServiceFactory financialConnections()
 * @method static \Erikwang2013\Stripe\Service\Forwarding\ForwardingServiceFactory forwarding()
 * @method static \Erikwang2013\Stripe\Service\Identity\IdentityServiceFactory identity()
 * @method static \Erikwang2013\Stripe\Service\InvoiceService invoices()
 * @method static \Erikwang2013\Stripe\Service\InvoiceItemService invoiceItems()
 * @method static \Erikwang2013\Stripe\Service\Issuing\IssuingServiceFactory issuing()
 * @method static \Erikwang2013\Stripe\Service\MandateService mandates()
 * @method static \Erikwang2013\Stripe\Service\PaymentIntentService paymentIntents()
 * @method static \Erikwang2013\Stripe\Service\PaymentLinkService paymentLinks()
 * @method static \Erikwang2013\Stripe\Service\PaymentMethodService paymentMethods()
 * @method static \Erikwang2013\Stripe\Service\PaymentMethodConfigurationService paymentMethodConfigurations()
 * @method static \Erikwang2013\Stripe\Service\PaymentMethodDomainService paymentMethodDomains()
 * @method static \Erikwang2013\Stripe\Service\PayoutService payouts()
 * @method static \Erikwang2013\Stripe\Service\PlanService plans()
 * @method static \Erikwang2013\Stripe\Service\PriceService prices()
 * @method static \Erikwang2013\Stripe\Service\ProductService products()
 * @method static \Erikwang2013\Stripe\Service\PromotionCodeService promotionCodes()
 * @method static \Erikwang2013\Stripe\Service\QuoteService quotes()
 * @method static \Erikwang2013\Stripe\Service\Radar\RadarServiceFactory radar()
 * @method static \Erikwang2013\Stripe\Service\RefundService refunds()
 * @method static \Erikwang2013\Stripe\Service\Reporting\ReportingServiceFactory reporting()
 * @method static \Erikwang2013\Stripe\Service\ReviewService reviews()
 * @method static \Erikwang2013\Stripe\Service\SetupAttemptService setupAttempts()
 * @method static \Erikwang2013\Stripe\Service\SetupIntentService setupIntents()
 * @method static \Erikwang2013\Stripe\Service\ShippingRateService shippingRates()
 * @method static \Erikwang2013\Stripe\Service\Sigma\SigmaServiceFactory sigma()
 * @method static \Erikwang2013\Stripe\Service\SourceService sources()
 * @method static \Erikwang2013\Stripe\Service\SubscriptionService subscriptions()
 * @method static \Erikwang2013\Stripe\Service\SubscriptionItemService subscriptionItems()
 * @method static \Erikwang2013\Stripe\Service\SubscriptionScheduleService subscriptionSchedules()
 * @method static \Erikwang2013\Stripe\Service\Tax\TaxServiceFactory tax()
 * @method static \Erikwang2013\Stripe\Service\TaxCodeService taxCodes()
 * @method static \Erikwang2013\Stripe\Service\TaxIdService taxIds()
 * @method static \Erikwang2013\Stripe\Service\TaxRateService taxRates()
 * @method static \Erikwang2013\Stripe\Service\Terminal\TerminalServiceFactory terminal()
 * @method static \Erikwang2013\Stripe\Service\TestHelpers\TestHelpersServiceFactory testHelpers()
 * @method static \Erikwang2013\Stripe\Service\TokenService tokens()
 * @method static \Erikwang2013\Stripe\Service\TopupService topups()
 * @method static \Erikwang2013\Stripe\Service\TransferService transfers()
 * @method static \Erikwang2013\Stripe\Service\Treasury\TreasuryServiceFactory treasury()
 * @method static \Erikwang2013\Stripe\Service\V2\V2ServiceFactory v2()
 * @method static \Erikwang2013\Stripe\Service\WebhookEndpointService webhookEndpoints()
 * @method static \Erikwang2013\Stripe\Service\OAuthService oauth()
 * @method static \Erikwang2013\Stripe\StripeObject deserialize(string $json)
 * @method static \Erikwang2013\Stripe\ApiResponse rawRequest(string $method, string $url, ?array $params = null, array $opts = [])
 *
 * @see \Erikwang2013\Stripe\StripeClient
 */
namespace Erikwang2013\Stripe\Laravel\Facade;

use Illuminate\Support\Facades\Facade;

class Stripe extends Facade
{
    /**
     * Get the registered name of the component.
     * 获取组件在容器中的注册名称
     */
    protected static function getFacadeAccessor()
    {
        return \Erikwang2013\Stripe\StripeClient::class;
    }
}
