<?php

/**
 * Stripe ThinkPHP 服务类
 *
 * 遵循 ThinkPHP 8 服务规范，支持自动注册和配置。
 * Follows ThinkPHP 8 service conventions with auto-registration.
 *
 * 用法 / Usage:
 *   在 app/service.php 中注册，或通过 composer auto-discovery 自动加载。
 *   Register in app/service.php or auto-load via composer.
 */
namespace Erikwang2013\Stripe\ThinkPHP;

use Erikwang2013\Stripe\Stripe;
use Erikwang2013\Stripe\StripeClient;
use think\Service;

class StripeService extends Service
{
    /**
     * 注册服务 / Register service
     */
    public function register()
    {
        // 绑定 StripeClient 到容器
        // Bind StripeClient to container
        $this->app->bind('stripe', function () {
            $config = $this->app->config->get('stripe');
            return new StripeClient($config['api_key'] ?? '');
        });

        $this->app->bind(StripeClient::class, function () {
            return $this->app->make('stripe');
        });
    }

    /**
     * 启动服务 / Boot service
     */
    public function boot()
    {
        // 从配置初始化 Stripe 全局静态属性
        // Initialize Stripe global static properties from config
        $config = $this->app->config->get('stripe');

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
}
