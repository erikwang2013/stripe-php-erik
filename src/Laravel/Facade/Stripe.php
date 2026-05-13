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
 * @method static \Stripe\Service\ApplePayDomainService applePayDomains()
 * @method static \Stripe\Service\Apps\AppsServiceFactory apps()
 * @method static \Stripe\Service\ApplicationFeeService applicationFees()
 * @method static \Stripe\Service\BalanceService balance()
 * @method static \Stripe\Service\BalanceTransactionService balanceTransactions()
 * @method static \Stripe\Service\Billing\BillingServiceFactory billing()
 * @method static \Stripe\Service\BillingPortal\BillingPortalServiceFactory billingPortal()
 * @method static \Stripe\Service\ChargeService charges()
 * @method static \Stripe\Service\Checkout\CheckoutServiceFactory checkout()
 * @method static \Stripe\Service\Climate\ClimateServiceFactory climate()
 * @method static \Stripe\Service\ConfirmationTokenService confirmationTokens()
 * @method static \Stripe\Service\CountrySpecService countrySpecs()
 * @method static \Stripe\Service\CouponService coupons()
 * @method static \Stripe\Service\CreditNoteService creditNotes()
 * @method static \Stripe\Service\CustomerService customers()
 * @method static \Stripe\Service\CustomerSessionService customerSessions()
 * @method static \Stripe\Service\DisputeService disputes()
 * @method static \Stripe\Service\Entitlements\EntitlementsServiceFactory entitlements()
 * @method static \Stripe\Service\EphemeralKeyService ephemeralKeys()
 * @method static \Stripe\Service\EventService events()
 * @method static \Stripe\Service\ExchangeRateService exchangeRates()
 * @method static \Stripe\Service\FileService files()
 * @method static \Stripe\Service\FileLinkService fileLinks()
 * @method static \Stripe\Service\FinancialConnections\FinancialConnectionsServiceFactory financialConnections()
 * @method static \Stripe\Service\Forwarding\ForwardingServiceFactory forwarding()
 * @method static \Stripe\Service\Identity\IdentityServiceFactory identity()
 * @method static \Stripe\Service\InvoiceService invoices()
 * @method static \Stripe\Service\InvoiceItemService invoiceItems()
 * @method static \Stripe\Service\Issuing\IssuingServiceFactory issuing()
 * @method static \Stripe\Service\MandateService mandates()
 * @method static \Stripe\Service\PaymentIntentService paymentIntents()
 * @method static \Stripe\Service\PaymentLinkService paymentLinks()
 * @method static \Stripe\Service\PaymentMethodService paymentMethods()
 * @method static \Stripe\Service\PaymentMethodConfigurationService paymentMethodConfigurations()
 * @method static \Stripe\Service\PaymentMethodDomainService paymentMethodDomains()
 * @method static \Stripe\Service\PayoutService payouts()
 * @method static \Stripe\Service\PlanService plans()
 * @method static \Stripe\Service\PriceService prices()
 * @method static \Stripe\Service\ProductService products()
 * @method static \Stripe\Service\PromotionCodeService promotionCodes()
 * @method static \Stripe\Service\QuoteService quotes()
 * @method static \Stripe\Service\Radar\RadarServiceFactory radar()
 * @method static \Stripe\Service\RefundService refunds()
 * @method static \Stripe\Service\Reporting\ReportingServiceFactory reporting()
 * @method static \Stripe\Service\ReviewService reviews()
 * @method static \Stripe\Service\SetupAttemptService setupAttempts()
 * @method static \Stripe\Service\SetupIntentService setupIntents()
 * @method static \Stripe\Service\ShippingRateService shippingRates()
 * @method static \Stripe\Service\Sigma\SigmaServiceFactory sigma()
 * @method static \Stripe\Service\SourceService sources()
 * @method static \Stripe\Service\SubscriptionService subscriptions()
 * @method static \Stripe\Service\SubscriptionItemService subscriptionItems()
 * @method static \Stripe\Service\SubscriptionScheduleService subscriptionSchedules()
 * @method static \Stripe\Service\Tax\TaxServiceFactory tax()
 * @method static \Stripe\Service\TaxCodeService taxCodes()
 * @method static \Stripe\Service\TaxIdService taxIds()
 * @method static \Stripe\Service\TaxRateService taxRates()
 * @method static \Stripe\Service\Terminal\TerminalServiceFactory terminal()
 * @method static \Stripe\Service\TestHelpers\TestHelpersServiceFactory testHelpers()
 * @method static \Stripe\Service\TokenService tokens()
 * @method static \Stripe\Service\TopupService topups()
 * @method static \Stripe\Service\TransferService transfers()
 * @method static \Stripe\Service\Treasury\TreasuryServiceFactory treasury()
 * @method static \Stripe\Service\V2\V2ServiceFactory v2()
 * @method static \Stripe\Service\WebhookEndpointService webhookEndpoints()
 * @method static \Stripe\Service\OAuthService oauth()
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
