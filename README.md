# Stripe PHP bindings · Stripe PHP 支付集成库

[![Build Status](https://github.com/erikwang2013/stripe-php-erik/actions/workflows/ci.yml/badge.svg?branch=master)](https://github.com/erikwang2013/stripe-php-erik/actions?query=branch%3Amaster)
[![Latest Stable Version](https://poser.pugx.org/erikwang2013/stripe-php-erik/v/stable.svg)](https://packagist.org/packages/erikwang2013/stripe-php-erik)
[![Total Downloads](https://poser.pugx.org/erikwang2013/stripe-php-erik/downloads.svg)](https://packagist.org/packages/erikwang2013/stripe-php-erik)
[![License](https://poser.pugx.org/erikwang2013/stripe-php-erik/license.svg)](https://packagist.org/packages/erikwang2013/stripe-php-erik)

> [!TIP]
> Want to chat live with Stripe engineers? Join us on our [Discord server](https://stripe.com/go/discord/php).

The Stripe PHP library provides convenient access to the Stripe API from
applications written in the PHP language. It includes a pre-defined set of
classes for API resources that initialize themselves dynamically from API
responses which makes it compatible with a wide range of versions of the Stripe
API.

Out-of-the-box integrations available for: **Laravel**, **Webman**, **Hyperf**, and **ThinkPHP**.

---

Stripe PHP 库为 PHP 应用提供了便捷的 Stripe API 访问能力。它包含一套预定义的 API 资源类，可以动态地从 API 响应中初始化，兼容多种版本的 Stripe API。

开箱即用，已适配以下框架：**Laravel**、**Webman**、**Hyperf**、**ThinkPHP**。

## Requirements · 环境要求

PHP 7.2.0 and later.

Note that per our [language version support policy](https://docs.stripe.com/sdks/versioning?lang=php#stripe-sdk-language-version-support-policy), support for PHP 7.2 and 7.3 will be removed soon, so upgrade your runtime if you're able to.

Additional PHP versions will be dropped in future major versions, so upgrade to supported versions if possible.

---

PHP 7.2.0 及以上版本。

根据 [语言版本支持策略](https://docs.stripe.com/sdks/versioning?lang=php#stripe-sdk-language-version-support-policy)，PHP 7.2 和 7.3 的支持将很快被移除，请尽快升级运行环境。

## Composer

You can install the bindings via [Composer](http://getcomposer.org/). Run the following command:

```bash
composer require erikwang2013/stripe-php-erik
```

To use the bindings, use Composer's [autoload](https://getcomposer.org/doc/01-basic-usage.md#autoloading):

```php
require_once 'vendor/autoload.php';
```

---

通过 [Composer](http://getcomposer.org/) 安装：

```bash
composer require erikwang2013/stripe-php-erik
```

使用 Composer 的自动加载引入库：

```php
require_once 'vendor/autoload.php';
```

## Manual Installation · 手动安装

If you do not wish to use Composer, you can download the [latest release](https://github.com/erikwang2013/stripe-php-erik/releases). Then, to use the bindings, include the `init.php` file.

```php
require_once '/path/to/stripe-php/init.php';
```

---

如果你不想使用 Composer，可以下载[最新版本](https://github.com/erikwang2013/stripe-php-erik/releases)，然后引入 `init.php` 文件：

```php
require_once '/path/to/stripe-php/init.php';
```

## Framework Integration · 框架集成

This library provides out-of-the-box integration for the following PHP frameworks.

本库为以下 PHP 框架提供开箱即用的集成支持。

---

### Framework Comparison · 框架对比

| 特性 / Feature | Laravel | Webman | Hyperf | ThinkPHP |
|---|---|---|---|---|
| **注册方式** Registration | Composer auto-discovery `extra.laravel` | `WEBMAN_PLUGIN` 常量标记 | `ConfigProvider` + `extra.hyperf.config` | `think\Service` + `extra.think.services` |
| **DI 支持** DI Support | ✅ 容器单例绑定 | ❌ 无容器 | ✅ 工厂 + 注解注入 | ✅ 容器绑定 |
| **Facade** 门面 | ✅ `Erikwang2013\Stripe\Laravel\Facade\Stripe` | ❌ | ❌ | ❌ |
| **配置发布** Config Publish | `artisan vendor:publish` | 自动拷贝到 `config/plugin/stripe/` | `php bin/hyperf.php vendor:publish` | 手动复制到 `config/stripe.php` |
| **配置路径** Config Path | `config/stripe.php` | `config/plugin/stripe/app.php` | `config/autoload/stripe.php` | `config/stripe.php` |
| **配置访问** Config Access | `config('stripe.*')` | `config('plugin.stripe.*')` | `config('stripe.*')` | `config('stripe.*')` |
| **Webhook 示例** Webhook Example | ✅ | ✅ | ✅ | ✅ |
| **运行模式** Runtime | PHP-FPM / Octane | Workerman 常驻进程 | Swoole 协程 | PHP-FPM / Swoole |
| **协程安全** Coroutine Safe | N/A | N/A | ⚠️ 需配置 SwooleCurl hook | N/A |

### Architecture · 架构说明

```
src/
├── Laravel/
│   ├── StripeServiceProvider.php   # 服务提供者：注册、配置发布、别名
│   └── Facade/
│       └── Stripe.php              # 门面：静态代理 StripeClient
├── Webman/
│   ├── Install.php                 # 插件安装器：WEBMAN_PLUGIN 标记 + 配置拷贝
│   └── StripeHelper.php            # 辅助类：init() + client()
├── Hyperf/
│   ├── ConfigProvider.php          # 配置提供器：DI 定义 + 配置发布 + boot()
│   └── StripeClientFactory.php     # 工厂：从容器创建 StripeClient
├── ThinkPHP/
│   ├── StripeService.php           # think\Service：容器绑定 + 自动注册
│   └── StripeHelper.php            # 辅助类：init() + client()
config/
└── stripe.php                      # 通用配置模板（含中英文注释）
```

| 类 / Class | 框架 / Framework | 作用 / Purpose |
|---|---|---|
| `Erikwang2013\Stripe\Laravel\StripeServiceProvider` | Laravel | 注册 `StripeClient` 单例、合并配置、发布 config |
| `Erikwang2013\Stripe\Laravel\Facade\Stripe` | Laravel | Facade 静态代理，IDE 友好的 `@method` 提示 |
| `Erikwang2013\Stripe\Webman\Install` | Webman | `WEBMAN_PLUGIN` 标记，`install()`/`uninstall()` 配置拷贝 |
| `Erikwang2013\Stripe\Webman\StripeHelper` | Webman | 从 `config('plugin.stripe')` 初始化全局静态属性 |
| `Erikwang2013\Stripe\Hyperf\ConfigProvider` | Hyperf | 注册 DI 工厂、定义配置发布源和目的地 |
| `Erikwang2013\Stripe\Hyperf\StripeClientFactory` | Hyperf | 实现 `__invoke(ContainerInterface)`, 返回 `StripeClient` |
| `Erikwang2013\Stripe\ThinkPHP\StripeService` | ThinkPHP | 继承 `think\Service`，`register()` 绑定容器，`boot()` 初始化 |
| `Erikwang2013\Stripe\ThinkPHP\StripeHelper` | ThinkPHP | 无框架启动时的后备方案，手动 `init()` + `client()` |

### Lifecycle · 生命周期

```
composer require
      │
      ├─── Laravel ──→ auto-discovery → ServiceProvider::register() → 容器绑定
      │                                 → ServiceProvider::boot()     → 配置合并
      │
      ├─── Webman  ──→ WEBMAN_PLUGIN 标记 → webman 启动时自动发现
      │             ──→ process.php 中手动 StripeHelper::init()
      │
      ├─── Hyperf  ──→ ConfigProvider::__invoke() → DI 定义注册
      │             ──→ 手动 php bin/hyperf.php vendor:publish
      │             ──→ 应用启动时 ConfigProvider::boot()
      │
      └─── ThinkPHP ──→ extra.think.services → StripeService::register() → 容器绑定
                                                StripeService::boot()     → 初始化
```

---

### Laravel

**Auto-discovery** · **自动发现**: The package registers itself automatically via Composer. No manual setup required.
包会自动通过 Composer 注册，无需手动配置。

Publish the configuration file · 发布配置文件：

```bash
php artisan vendor:publish --tag=stripe-config
```

Set your Stripe credentials in `.env` · 在 `.env` 中配置：

```env
STRIPE_API_KEY=sk_test_your_key
STRIPE_WEBHOOK_SECRET=whsec_your_secret
```

**Using Dependency Injection** · **依赖注入方式**：

```php
use Erikwang2013\Stripe\StripeClient;

class PaymentController
{
    public function charge(StripeClient $stripe)
    {
        $charge = $stripe->charges->create([
            'amount' => 2000,
            'currency' => 'usd',
            'source' => 'tok_visa',
        ]);

        return response()->json($charge);
    }
}
```

**Using the Facade** · **门面方式**：

```php
use Erikwang2013\Stripe\Laravel\Facade\Stripe;

$customer = Stripe::customers()->create([
    'email' => 'user@example.com',
]);
```

**Using the helper function** · **辅助函数方式**：

```php
$stripe = app('stripe');
$customer = $stripe->customers->create(['email' => 'user@example.com']);
```

**Webhook handling** · **处理 Webhook**：

```php
use Erikwang2013\Stripe\Webhook;
use Illuminate\Http\Request;

Route::post('/stripe/webhook', function (Request $request) {
    $signature = $request->header('Stripe-Signature');
    $secret = config('stripe.webhook_secret');

    try {
        $event = Webhook::constructEvent(
            $request->getContent(),
            $signature,
            $secret
        );

        // Handle event... · 处理事件...

        return response('', 200);
    } catch (\Exception $e) {
        return response('', 400);
    }
});
```

---

### Webman

This package follows **webman basic plugin conventions** (`WEBMAN_PLUGIN`).

本包遵循 **webman 基础插件规范**（`WEBMAN_PLUGIN` 标记）。

Install · 安装：

```bash
composer require erikwang2013/stripe-php-erik
```

安装时自动将配置拷贝到 `config/plugin/stripe/app.php`，webman 会自动识别并合并该配置。

On install, the config is automatically copied to `config/plugin/stripe/app.php`, which webman auto-detects and merges.

The auto-generated config file · 自动生成的配置文件 `config/plugin/stripe/app.php`：

```php
<?php
return [
    'api_key' => getenv('STRIPE_API_KEY') ?: '',
    'api_base' => getenv('STRIPE_API_BASE') ?: null,
    'api_version' => getenv('STRIPE_API_VERSION') ?: null,
    'webhook_secret' => getenv('STRIPE_WEBHOOK_SECRET') ?: '',
    'client_id' => getenv('STRIPE_CLIENT_ID') ?: null,
    'max_network_retries' => getenv('STRIPE_MAX_NETWORK_RETRIES') ?: 0,
    'enable_telemetry' => getenv('STRIPE_ENABLE_TELEMETRY') ?: true,
    'ca_bundle_path' => getenv('STRIPE_CA_BUNDLE_PATH') ?: null,
    'app_info' => [
        'name' => getenv('STRIPE_APP_NAME') ?: null,
        'version' => getenv('STRIPE_APP_VERSION') ?: null,
        'url' => getenv('STRIPE_APP_URL') ?: null,
    ],
];
```

Initialize in `process.php` or `bootstrap.php` · 在 `process.php` 或 `bootstrap.php` 中初始化：

```php
use Erikwang2013\Stripe\Webman\StripeHelper;

// Initialize on worker start · 在 Worker 启动时初始化
StripeHelper::init();
```

Basic usage · 基本用法：

```php
use Erikwang2013\Stripe\Webman\StripeHelper;
use Erikwang2013\Stripe\StripeClient;

// Via helper · 通过辅助类
$stripe = StripeHelper::client();
$customer = $stripe->customers->create([
    'email' => 'user@example.com',
]);

// Or directly · 或直接使用
$stripe = new StripeClient(getenv('STRIPE_API_KEY'));
```

**Webman 插件机制说明**：
- `Erikwang2013\Stripe\Webman\Install` 类含 `WEBMAN_PLUGIN = true` 常量，标记为 webman 基础插件
- `composer install/update` 时触发 `Install::install()` 自动拷贝配置
- `composer remove` 时触发 `Install::uninstall()` 自动清理配置

**Webhook handling in webman** · **Webman 中处理 Webhook**：

```php
use Erikwang2013\Stripe\Webhook;
use Webman\Http\Request;
use Webman\Http\Response;

class StripeWebhook
{
    public function index(Request $request): Response
    {
        $signature = $request->header('Stripe-Signature');
        $secret = config('plugin.stripe.webhook_secret');

        try {
            $event = Webhook::constructEvent(
                $request->rawBody(),
                $signature,
                $secret
            );

            // Handle event... · 处理事件...

            return response('', 200);
        } catch (\Exception $e) {
            return response('', 400);
        }
    }
}
```

---

### Hyperf

This package follows **Hyperf component conventions** via `ConfigProvider`.

本包遵循 **Hyperf 组件规范**，通过 `ConfigProvider` 自动注册。

Install · 安装：

```bash
composer require erikwang2013/stripe-php-erik
```

Publish config · 发布配置：

```bash
php bin/hyperf.php vendor:publish erikwang2013/stripe-php-erik
```

Set credentials in `.env` · 在 `.env` 中配置：

```env
STRIPE_API_KEY=sk_test_your_key
STRIPE_WEBHOOK_SECRET=whsec_your_secret
```

**Using Dependency Injection** · **依赖注入方式**：

```php
use Erikwang2013\Stripe\StripeClient;
use Hyperf\Di\Annotation\Inject;

class PaymentController extends AbstractController
{
    #[Inject]
    protected StripeClient $stripe;

    public function charge()
    {
        $charge = $this->stripe->charges->create([
            'amount' => 2000,
            'currency' => 'usd',
            'source' => 'tok_visa',
        ]);

        return $this->response->json($charge->toArray());
    }
}
```

**Configuration via ConfigProvider** · **ConfigProvider 配置机制**：
- `Erikwang2013\Stripe\Hyperf\ConfigProvider` 通过 `composer.json` 中 `extra.hyperf.config` 自动发现
- `StripeClient` 通过 `StripeClientFactory` 工厂由 DI 容器管理
- 配置文件发布到 `config/autoload/stripe.php`，Hyperf 自动加载

**Coroutine safety** · **协程安全说明**: The Stripe library uses curl, which is blocking. For non-blocking operation in Hyperf, consider wrapping calls with `Hyperf\Coroutine\Parallel` or enabling Hyperf's `SwooleCurl` hook in your server config.

Stripe 库底层使用 curl，是同步阻塞的。如需在 Hyperf 中非阻塞运行，建议：
1. 使用 `Hyperf\Coroutine\Parallel` 包裹调用
2. 在 `config/autoload/server.php` 中启用 `SWOOLE_HOOK_CURL`

---

### ThinkPHP

This package follows **ThinkPHP 8 service conventions** via `think\Service`.

本包遵循 **ThinkPHP 8 服务规范**，通过 `think\Service` 自动注册。

Install · 安装：

```bash
composer require erikwang2013/stripe-php-erik
```

**方式一：自动注册（推荐）** · **Auto-registration (recommended)**

`Erikwang2013\Stripe\ThinkPHP\StripeService` 通过 `composer.json` 中 `extra.think.services` 自动发现，无需手动配置。

The `Erikwang2013\Stripe\ThinkPHP\StripeService` is auto-discovered via `extra.think.services` in composer.json — no manual setup required.

Create config at `config/stripe.php` · 在 `config/stripe.php` 创建配置文件：

```php
<?php
return [
    'api_key' => env('stripe.api_key', ''),
    'api_base' => env('stripe.api_base', null),
    'api_version' => env('stripe.api_version', null),
    'webhook_secret' => env('stripe.webhook_secret', ''),
    'client_id' => env('stripe.client_id', null),
    'max_network_retries' => env('stripe.max_network_retries', 0),
    'enable_telemetry' => env('stripe.enable_telemetry', true),
    'ca_bundle_path' => env('stripe.ca_bundle_path', null),
    'app_info' => [
        'name' => env('stripe.app_name', null),
        'version' => env('stripe.app_version', null),
        'url' => env('stripe.app_url', null),
    ],
];
```

**方式二：手动初始化** · **Manual initialization**

在 `AppService.php` 或控制器中手动调用 `StripeHelper::init()`：

```php
use Erikwang2013\Stripe\ThinkPHP\StripeHelper;

class AppService extends Service
{
    public function boot()
    {
        StripeHelper::init();
    }
}
```

Usage · 用法：

```php
use Erikwang2013\Stripe\ThinkPHP\StripeHelper;
use Erikwang2013\Stripe\StripeClient;

// Via helper · 通过辅助类
$stripe = StripeHelper::client();
$customer = $stripe->customers->create([
    'email' => 'user@example.com',
]);

// Via container (when StripeService is registered) · 通过容器（StripeService 注册后）
$stripe = app('stripe');
// Or via DI · 或依赖注入
// public function __construct(StripeClient $stripe) { ... }

// Or directly · 或直接使用
$stripe = new StripeClient(config('stripe.api_key'));
```

**Webhook handling in ThinkPHP** · **ThinkPHP 中处理 Webhook**：

```php
use Erikwang2013\Stripe\Webhook;

class StripeWebhook
{
    public function index()
    {
        $signature = request()->header('Stripe-Signature');
        $secret = config('stripe.webhook_secret');

        try {
            $event = Webhook::constructEvent(
                request()->getContent(),
                $signature,
                $secret
            );

            // Handle event... · 处理事件...

            return response('', 200);
        } catch (\Exception $e) {
            return response('', 400);
        }
    }
}
```

## Dependencies · 依赖项

The bindings require the following extensions in order to work properly:

- [`curl`](https://secure.php.net/manual/en/book.curl.php), although you can use your own non-cURL client if you prefer
- [`json`](https://secure.php.net/manual/en/book.json.php)
- [`mbstring`](https://secure.php.net/manual/en/book.mbstring.php) (Multibyte String)

If you use Composer, these dependencies should be handled automatically. If you install manually, you'll want to make sure that these extensions are available.

---

本库需要以下 PHP 扩展才能正常工作：

- [`curl`](https://secure.php.net/manual/en/book.curl.php)
- [`json`](https://secure.php.net/manual/en/book.json.php)
- [`mbstring`](https://secure.php.net/manual/en/book.mbstring.php)（多字节字符串）

使用 Composer 安装时会自动处理这些依赖。手动安装时请确保这些扩展已启用。

## Getting Started · 快速开始

Simple usage looks like · 简单用法示例：

```php
$stripe = new \Erikwang2013\Stripe\StripeClient('sk_test_...');
$customer = $stripe->customers->create([
    'description' => 'example customer',
    'email' => 'email@example.com',
    'payment_method' => 'pm_card_visa',
]);
echo $customer;
```

### Client/service patterns vs legacy patterns · 新旧模式对比

You can continue to use the legacy integration patterns used prior to version [7.33.0](https://github.com/erikwang2013/stripe-php-erik/blob/master/CHANGELOG.md#7330---2020-05-14). Review the [migration guide](https://github.com/erikwang2013/stripe-php-erik/wiki/Migration-to-StripeClient-and-services-in-7.33.0) for the backwards-compatible client/service pattern changes.

你可以继续使用 [7.33.0](https://github.com/erikwang2013/stripe-php-erik/blob/master/CHANGELOG.md#7330---2020-05-14) 之前的旧版集成模式。查看[迁移指南](https://github.com/erikwang2013/stripe-php-erik/wiki/Migration-to-StripeClient-and-services-in-7.33.0)了解向后兼容的 client/service 模式变更。

## Documentation · 文档

See the [PHP API docs](https://stripe.com/docs/api/?lang=php#intro).
详见 [PHP API 文档](https://stripe.com/docs/api/?lang=php#intro)。

## Custom Request Timeouts · 自定义请求超时

> **Note** · **注意**
> We do not recommend decreasing the timeout for non-read-only calls (e.g. charge creation), since even if you locally timeout, the request on Stripe's side can still complete. If you are decreasing timeouts on these calls, make sure to use [idempotency tokens](https://stripe.com/docs/api/?lang=php#idempotent_requests) to avoid executing the same transaction twice as a result of timeout retry logic.
>
> 不建议缩短非只读请求（如创建支付）的超时时间，因为即使你本地超时了，Stripe 服务端的请求仍可能完成。如需缩短此类请求的超时，请使用[幂等令牌](https://stripe.com/docs/api/?lang=php#idempotent_requests)防止超时重试导致重复执行。

To modify request timeouts (connect or total, in seconds) you'll need to tell the API client to use a CurlClient other than its default. You'll set the timeouts in that CurlClient.

要修改请求超时时间（连接超时或总超时，单位秒），需要配置 CurlClient：

```php
// set up your tweaked Curl client · 配置自定义 Curl 客户端
$curl = new \Erikwang2013\Stripe\HttpClient\CurlClient();
$curl->setTimeout(10); // default is \Erikwang2013\Stripe\HttpClient\CurlClient::DEFAULT_TIMEOUT
$curl->setConnectTimeout(5); // default is \Erikwang2013\Stripe\HttpClient\CurlClient::DEFAULT_CONNECT_TIMEOUT

echo $curl->getTimeout(); // 10
echo $curl->getConnectTimeout(); // 5

// tell Stripe to use the tweaked client · 让 Stripe 使用自定义客户端
\Erikwang2013\Stripe\ApiRequestor::setHttpClient($curl);

// use the Stripe API client as you normally would · 正常使用即可
```

## Custom cURL Options (e.g. proxies) · 自定义 cURL 选项（如代理）

Need to set a proxy for your requests? Pass in the requisite `CURLOPT_*` array to the CurlClient constructor, using the same syntax as `curl_stopt_array()`. This will set the default cURL options for each HTTP request made by the SDK, though many more common options (e.g. timeouts; see above on how to set those) will be overridden by the client even if set here.

需要设置代理？向 CurlClient 构造函数传入 `CURLOPT_*` 数组即可：

```php
// set up your tweaked Curl client · 配置带代理的 Curl 客户端
$curl = new \Erikwang2013\Stripe\HttpClient\CurlClient([CURLOPT_PROXY => 'proxy.local:80']);
// tell Stripe to use the tweaked client · 让 Stripe 使用此客户端
\Erikwang2013\Stripe\ApiRequestor::setHttpClient($curl);
```

Alternately, a callable can be passed to the CurlClient constructor that returns the above array based on request inputs. See `testDefaultOptions()` in `tests/CurlClientTest.php` for an example of this behavior. Note that the callable is called at the beginning of every API request, before the request is sent.

### Configuring a Logger · 配置日志

The library does minimal logging, but it can be configured
with a [`PSR-3` compatible logger][psr3] so that messages
end up there instead of `error_log`:

本库内置少量日志，可配置为 [`PSR-3` 兼容的日志记录器][psr3]：

```php
\Erikwang2013\Stripe\Stripe::setLogger($logger);
```

### Accessing response data · 访问响应数据

You can access the data from the last API response on any object via `getLastResponse()`.

可以通过 `getLastResponse()` 访问任意对象上最后一次 API 响应的数据：

```php
$customer = $stripe->customers->create([
    'description' => 'example customer',
]);
echo $customer->getLastResponse()->headers['Request-Id'];
```

### SSL / TLS compatibility issues · SSL / TLS 兼容性

Stripe's API now requires that [all connections use TLS 1.2](https://stripe.com/blog/upgrading-tls). Some systems (most notably some older CentOS and RHEL versions) are capable of using TLS 1.2 but will use TLS 1.0 or 1.1 by default. In this case, you'd get an `invalid_request_error` with the following error message: "Stripe no longer supports API requests made with TLS 1.0. Please initiate HTTPS connections with TLS 1.2 or later. You can learn more about this at [https://stripe.com/blog/upgrading-tls](https://stripe.com/blog/upgrading-tls).".

Stripe API 要求[所有连接使用 TLS 1.2](https://stripe.com/blog/upgrading-tls)。部分系统（尤其是较旧的 CentOS 和 RHEL）默认使用 TLS 1.0 或 1.1，可能报错。

The recommended course of action is to [upgrade your cURL and OpenSSL packages](https://support.stripe.com/questions/how-do-i-upgrade-my-stripe-integration-from-tls-1-0-to-tls-1-2#php) so that TLS 1.2 is used by default, but if that is not possible, you might be able to solve the issue by setting the `CURLOPT_SSLVERSION` option to either `CURL_SSLVERSION_TLSv1` or `CURL_SSLVERSION_TLSv1_2`:

建议[升级 cURL 和 OpenSSL](https://support.stripe.com/questions/how-do-i-upgrade-my-stripe-integration-from-tls-1-0-to-tls-1-2#php)，或手动设置 SSL 版本：

```php
$curl = new \Erikwang2013\Stripe\HttpClient\CurlClient([CURLOPT_SSLVERSION => CURL_SSLVERSION_TLSv1]);
\Erikwang2013\Stripe\ApiRequestor::setHttpClient($curl);
```

### Per-request Configuration · 单次请求配置

For apps that need to use multiple keys during the lifetime of a process, like
one that uses [Stripe Connect][connect], it's also possible to set a
per-request key and/or account:

对于需要在同一进程中使用多个密钥的应用（如使用 [Stripe Connect][connect]），可以设置单次请求的密钥和/或账户：

```php
$customers = $stripe->customers->all([],[
    'api_key' => 'sk_test_...',
    'stripe_account' => 'acct_...'
]);

$stripe->customers->retrieve('cus_123456789', [], [
    'api_key' => 'sk_test_...',
    'stripe_account' => 'acct_...'
]);
```

### Configuring CA Bundles · 配置 CA 证书包

By default, the library will use its own internal bundle of known CA
certificates, but it's possible to configure your own:

默认使用内置 CA 证书包，也可以自定义：

```php
\Erikwang2013\Stripe\Stripe::setCABundlePath("path/to/ca/bundle");
```

### Configuring Automatic Retries · 配置自动重试

The library can be configured to automatically retry requests that fail due to
an intermittent network problem. [Idempotency keys][idempotency-keys] are added to requests to guarantee that retries are safe.

可配置自动重试因间歇性网络问题失败的请求。请求会自动附加[幂等令牌][idempotency-keys]确保重试安全：

```php
\Erikwang2013\Stripe\Stripe::setMaxNetworkRetries(2);
```

### Telemetry · 遥测

By default, the library sends telemetry to Stripe regarding request latency and feature usage. These
numbers help Stripe improve the overall latency of its API for all users, and
improve popular features.

You can disable this behavior if you prefer:

默认会向 Stripe 发送请求延迟和功能使用的遥测数据，用于优化 API 性能。可以禁用：

```php
\Erikwang2013\Stripe\Stripe::setEnableTelemetry(false);
```

### How to use undocumented parameters and properties · 使用未文档化的参数

In some cases, you might encounter parameters on an API request or fields on an API response that aren't available in the SDKs. See [undocumented params and properties](https://docs.stripe.com/sdks/server-side?lang=php#undocumented-params-and-fields) to send those parameters or access those fields.

如遇到 SDK 中不可用的 API 参数或响应字段，参考[未文档化参数和属性](https://docs.stripe.com/sdks/server-side?lang=php#undocumented-params-and-fields)。

### Public Preview SDKs · 公开预览版 SDK

Stripe has features in the [public preview phase](https://docs.stripe.com/release-phases) that can be accessed via versions of this package that have the `-beta.X` suffix like `12.2.0-beta.2`. We would love for you to try these as we incrementally release new features and improve them based on your feedback.

Stripe 在[公开预览阶段](https://docs.stripe.com/release-phases)的功能可以通过 `-beta.X` 后缀的版本使用。

```bash
composer require erikwang2013/stripe-php-erik:v<replace-with-the-version-of-your-choice>
```

> **Note** · **注意**
> There can be breaking changes between two versions of the public preview SDKs without a bump in the major version. Therefore we recommend pinning the package version to a specific version in your composer.json file.
> 公开预览版之间可能存在不兼容变更，建议在 composer.json 中固定版本号。

### Private Preview SDKs · 私有预览版 SDK

Stripe has features in the [private preview phase](https://docs.stripe.com/release-phases) that can be accessed via versions of this package that have the `-alpha.X` suffix like `12.2.0-alpha.2`. These are invite-only features.

Stripe [私有预览阶段](https://docs.stripe.com/release-phases)的功能通过 `-alpha.X` 后缀版本提供，仅限受邀用户。

### Custom requests · 自定义请求

> This feature is only available from version 16 of this SDK.
> 此功能仅 SDK v16 以上可用。

If you would like to send a request to an undocumented API (for example you are in a private beta), or if you prefer to bypass the method definitions in the library and specify your request details directly, you can use the `rawRequest` method on the StripeClient.

如需向未文档化的 API 发送请求，或想绕过库中的方法定义直接指定请求细节，可使用 `rawRequest`：

```php
$stripe = new \Erikwang2013\Stripe\StripeClient('sk_test_xyz');
$response = $stripe->rawRequest('post', '/v1/beta_endpoint', [
  "caveat": "emptor"
], [
  "stripe_version" => "2022-11_15",
]);
// $response->body is a string, you can call $stripe->deserialize to get a \Erikwang2013\Stripe\StripeObject.
$obj = $stripe->deserialize($response->body);

// For GET requests, the params argument must be null, and you should write the query string explicitly.
$get_response = $stripe->rawRequest('get', '/v1/beta_endpoint?caveat=emptor', null, [
  "stripe_version" => "2022-11_15",
]);
```

## Support · 支持

New features and bug fixes are released on the latest major version of the Stripe PHP library. If you are on an older major version, we recommend that you upgrade to the latest in order to use the new features and bug fixes including those for security vulnerabilities. Older major versions of the package will continue to be available for use, but will not be receiving any updates.

新功能和错误修复会发布在最新主版本上。建议升级到最新版本以获得安全漏洞修复和新功能。旧版本仍可使用，但不再收到更新。

## Development · 开发

[Contribution guidelines for this project](CONTRIBUTING.md) · [贡献指南](CONTRIBUTING.md)

We use [just](https://github.com/casey/just) for conveniently running development tasks. You can use them directly, or copy the commands out of the `justfile`. To our help docs, run `just`.

我们使用 [just](https://github.com/casey/just) 来便捷地运行开发任务，运行 `just` 查看帮助。

To get started, install [Composer][composer]. For example, on Mac OS:

安装 [Composer][composer] 后执行：

```bash
brew install composer
```

Install dependencies · 安装依赖：

```bash
just install
# or: composer install
```

The test suite depends on [stripe-mock], so make sure to fetch and run it from a
background terminal ([stripe-mock's README][stripe-mock] also contains
instructions for installing via Homebrew and other methods):

测试套件依赖 [stripe-mock]，在后台终端中启动：

```bash
go install github.com/stripe/stripe-mock@latest
stripe-mock
```

Install dependencies as mentioned above (which will resolve [PHPUnit](http://packagist.org/packages/phpunit/phpunit)), then you can run the test suite:

安装依赖后运行测试：

```bash
just test
# or: ./vendor/bin/phpunit
```

Or to run an individual test file · 或运行单个测试文件：

```bash
just test tests/Stripe/UtilTest.php
# or: ./vendor/bin/phpunit tests/Stripe/UtilTest.php
```

Update bundled CA certificates from the [Mozilla cURL release][curl] · 更新 CA 证书：

```bash
./update_certs.php
```

The library uses [PHP CS Fixer][php-cs-fixer] for code formatting. Code must be formatted before PRs are submitted, otherwise CI will fail. Run the formatter with:

使用 [PHP CS Fixer][php-cs-fixer] 格式化代码：

```bash
just format
# or: ./vendor/bin/php-cs-fixer fix -v .
```

## Attention plugin developers · 插件开发者注意

Are you writing a plugin that integrates Stripe and embeds our library? Then please use the `setAppInfo` function to identify your plugin. For example:

如果你正在开发集成 Stripe 并嵌入本库的插件，请使用 `setAppInfo` 标识你的插件：

```php
\Erikwang2013\Stripe\Stripe::setAppInfo("MyAwesomePlugin", "1.2.34", "https://myawesomeplugin.info");
```

The method should be called once, before any request is sent to the API. The second and third parameters are optional.

此方法应在发送任何 API 请求之前调用一次，第二、三个参数可选。

### SSL / TLS configuration option · SSL / TLS 配置选项

See the "SSL / TLS compatibility issues" paragraph above for full context. If you want to ensure that your plugin can be used on all systems, you should add a configuration option to let your users choose between different values for `CURLOPT_SSLVERSION`: none (default), `CURL_SSLVERSION_TLSv1` and `CURL_SSLVERSION_TLSv1_2`.

详见上文"SSL / TLS 兼容性"章节。为确保插件兼容所有系统，建议提供 `CURLOPT_SSLVERSION` 配置选项供用户选择。

[composer]: https://getcomposer.org/
[connect]: https://stripe.com/connect
[curl]: http://curl.haxx.se/docs/caextract.html
[idempotency-keys]: https://stripe.com/docs/api/?lang=php#idempotent_requests
[php-cs-fixer]: https://github.com/FriendsOfPHP/PHP-CS-Fixer
[psr3]: http://www.php-fig.org/psr/psr-3/
[stripe-mock]: https://github.com/stripe/stripe-mock
