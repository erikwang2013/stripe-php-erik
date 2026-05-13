<?php

/**
 * Stripe Laravel ServiceProvider 服务提供者
 *
 * 自动通过 Composer 注册，无需手动配置。
 * Auto-registers via Composer. No manual setup required.
 *
 * 功能 / Features:
 *   - 注册 StripeClient 单例到容器
 *   - 发布配置文件 config/stripe.php
 *   - 提供 'stripe' 别名和 Facade 支持
 */
namespace Erikwang2013\Stripe\Laravel;

use Illuminate\Support\ServiceProvider;
use Erikwang2013\Stripe\Stripe;
use Erikwang2013\Stripe\StripeClient;

class StripeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     * 启动服务：合并配置、发布配置文件
     */
    public function boot()
    {
        $configPath = __DIR__ . '/../../config/stripe.php';

        if (function_exists('config_path')) {
            $publishPath = config_path('stripe.php');
        } else {
            $publishPath = base_path('config/stripe.php');
        }

        $this->publishes([
            $configPath => $publishPath,
        ], 'stripe-config');

        $this->mergeConfigFrom($configPath, 'stripe');
    }

    /**
     * Register any application services.
     * 注册服务：绑定 StripeClient 到容器
     */
    public function register()
    {
        $this->app->singleton(StripeClient::class, function ($app) {
            $config = $app['config']->get('stripe');

            $client = new StripeClient($config['api_key']);

            if ($config['api_base']) {
                Stripe::$apiBase = $config['api_base'];
            }

            if ($config['api_version']) {
                Stripe::$apiVersion = $config['api_version'];
            }

            if ($config['client_id']) {
                Stripe::$clientId = $config['client_id'];
            }

            Stripe::setMaxNetworkRetries($config['max_network_retries'] ?? 0);
            Stripe::setEnableTelemetry($config['enable_telemetry'] ?? true);

            if ($config['ca_bundle_path']) {
                Stripe::setCABundlePath($config['ca_bundle_path']);
            }

            if ($config['app_info']['name']) {
                Stripe::setAppInfo(
                    $config['app_info']['name'],
                    $config['app_info']['version'],
                    $config['app_info']['url']
                );
            }

            return $client;
        });

        $this->app->alias(StripeClient::class, 'stripe');
    }
}
