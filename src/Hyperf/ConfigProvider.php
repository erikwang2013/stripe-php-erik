<?php

/**
 * Stripe Hyperf ConfigProvider 配置提供器
 *
 * 通过 Composer 自动发现，注册依赖和配置发布。
 * Auto-discovered via Composer. Registers dependencies and config publishing.
 */
namespace Stripe\Hyperf;

use Stripe\Stripe;
use Stripe\StripeClient;

class ConfigProvider
{
    /**
     * 返回 Hyperf 配置数组
     * Returns the Hyperf configuration array.
     */
    public function __invoke(): array
    {
        return [
            // 依赖注入定义 / DI definitions
            'dependencies' => [
                StripeClient::class => StripeClientFactory::class,
            ],
            // 配置发布 / Config publishing
            'publish' => [
                [
                    'id' => 'config',
                    'description' => 'Stripe PHP 配置文件 / configuration file.',
                    'source' => __DIR__ . '/../../config/stripe.php',
                    'destination' => BASE_PATH . '/config/autoload/stripe.php',
                ],
            ],
            'commands' => [],
            'listeners' => [],
            'annotations' => [
                'scan' => [
                    'paths' => [
                        __DIR__,
                    ],
                ],
            ],
        ];
    }

    /**
     * Bootstrap Stripe configuration.
     * 初始化 Stripe 全局配置。
     *
     * 在 App 启动时调用，从 config('stripe') 读取配置。
     * Call on app boot to read from config('stripe').
     */
    public static function boot(): void
    {
        $config = config('stripe', []);

        Stripe::setApiKey($config['api_key'] ?? '');

        if (!empty($config['api_base'])) {
            Stripe::$apiBase = $config['api_base'];
        }

        if (!empty($config['api_version'])) {
            Stripe::$apiVersion = $config['api_version'];
        }

        if (!empty($config['client_id'])) {
            Stripe::$clientId = $config['client_id'];
        }

        Stripe::setMaxNetworkRetries($config['max_network_retries'] ?? 0);
        Stripe::setEnableTelemetry($config['enable_telemetry'] ?? true);

        if (!empty($config['ca_bundle_path'])) {
            Stripe::setCABundlePath($config['ca_bundle_path']);
        }

        if (!empty($config['app_info']['name'])) {
            Stripe::setAppInfo(
                $config['app_info']['name'],
                $config['app_info']['version'],
                $config['app_info']['url']
            );
        }
    }
}
