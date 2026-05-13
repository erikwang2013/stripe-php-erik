<?php

/**
 * Stripe PHP 配置文件 / Configuration File
 *
 * 支持框架 / Supported Frameworks:
 *   - Laravel:    php artisan vendor:publish --tag=stripe-config
 *   - Webman:     放入 config/plugin/stripe.php
 *   - Hyperf:     php bin/hyperf.php vendor:publish erikwang2013/stripe-php-erik
 *   - ThinkPHP:   放入 config/stripe.php
 */

return [
    /*
     * Stripe API Secret Key · API 密钥
     * Get it from · 获取地址: https://dashboard.stripe.com/apikeys
     */
    'api_key' => env('STRIPE_API_KEY', ''),

    /*
     * Stripe API Base URL · API 基础 URL
     * null defaults to · 默认为 https://api.stripe.com
     */
    'api_base' => env('STRIPE_API_BASE', null),

    /*
     * Stripe API Version · API 版本
     * null defaults to the latest version supported by this SDK
     * 默认为本 SDK 支持的最新版本
     */
    'api_version' => env('STRIPE_API_VERSION', null),

    /*
     * Webhook Signing Secret · Webhook 签名密钥
     * Used for verifying webhook signatures · 用于验证 Webhook 签名
     */
    'webhook_secret' => env('STRIPE_WEBHOOK_SECRET', ''),

    /*
     * Connect Client ID · Connect 客户端 ID
     * Required only if using Stripe Connect · 仅在使用 Stripe Connect 时需要
     */
    'client_id' => env('STRIPE_CLIENT_ID', null),

    /*
     * Max Network Retries · 最大网络重试次数
     * Number of times to retry failed requests (0-2 recommended)
     * 失败请求重试次数（推荐 0-2）
     */
    'max_network_retries' => env('STRIPE_MAX_NETWORK_RETRIES', 0),

    /*
     * Enable Telemetry · 启用遥测
     * Send usage telemetry to Stripe · 向 Stripe 发送使用情况遥测
     */
    'enable_telemetry' => env('STRIPE_ENABLE_TELEMETRY', true),

    /*
     * CA Bundle Path · CA 证书包路径
     * Custom path to CA certificates bundle · 自定义 CA 证书包路径
     */
    'ca_bundle_path' => env('STRIPE_CA_BUNDLE_PATH', null),

    /*
     * App Info · 应用信息
     * Identify your application to Stripe · 向 Stripe 标识你的应用
     */
    'app_info' => [
        'name' => env('STRIPE_APP_NAME', null),
        'version' => env('STRIPE_APP_VERSION', null),
        'url' => env('STRIPE_APP_URL', null),
    ],
];
