<?php

/**
 * Stripe Hyperf Client 工厂
 *
 * 为 Hyperf DI 容器创建 StripeClient 实例。
 * Creates StripeClient instances for the Hyperf DI container.
 */
namespace Erikwang2013\Stripe\Hyperf;

use Hyperf\Contract\ConfigInterface;
use Psr\Container\ContainerInterface;
use Erikwang2013\Stripe\StripeClient;

class StripeClientFactory
{
    /**
     * 从容器中创建 StripeClient
     * Creates a StripeClient from the container.
     */
    public function __invoke(ContainerInterface $container): StripeClient
    {
        $config = $container->get(ConfigInterface::class)->get('stripe', []);

        return new StripeClient($config['api_key'] ?? '');
    }
}
