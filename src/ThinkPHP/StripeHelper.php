<?php

/**
 * Stripe ThinkPHP 辅助类
 *
 * 用法 / Usage:
 *   \Erikwang2013\Stripe\ThinkPHP\StripeHelper::init();
 *   $stripe = \Erikwang2013\Stripe\ThinkPHP\StripeHelper::client();
 */
namespace Erikwang2013\Stripe\ThinkPHP;

use Erikwang2013\Stripe\Stripe;
use Erikwang2013\Stripe\StripeClient;

class StripeHelper
{
    /**
     * Initialize Stripe with ThinkPHP config.
     * 使用 ThinkPHP 配置初始化 Stripe。
     *
     * 在 AppService::boot() 或控制器构造函数中调用。
     * Call in AppService::boot() or controller constructor.
     */
    public static function init(): void
    {
        $config = config('stripe');

        if (empty($config)) {
            return;
        }

        if (!empty($config['api_key'])) {
            Stripe::setApiKey($config['api_key']);
        }

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

    /**
     * Get a pre-configured StripeClient instance.
     * 获取已配置的 StripeClient 实例。
     */
    public static function client(): StripeClient
    {
        return new StripeClient(config('stripe.api_key') ?? '');
    }
}
