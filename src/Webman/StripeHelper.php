<?php

/**
 * Stripe Webman 辅助类
 *
 * 用法 / Usage:
 *   在 process.php 中初始化 / Initialize in process.php:
 *     \Erikwang2013\Stripe\Webman\StripeHelper::init();
 *     $stripe = \Erikwang2013\Stripe\Webman\StripeHelper::client();
 */
namespace Erikwang2013\Stripe\Webman;

use Erikwang2013\Stripe\Stripe;
use Erikwang2013\Stripe\StripeClient;

class StripeHelper
{
    /**
     * Initialize Stripe with Webman config.
     * 使用 Webman 配置初始化 Stripe。
     *
     * 在 process.php 或 bootstrap.php 的 Worker 启动时调用。
     * Call on worker start in process.php or bootstrap.php.
     */
    public static function init(): void
    {
        $config = config('plugin.stripe');

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
        return new StripeClient(config('plugin.stripe.api_key') ?? '');
    }
}
