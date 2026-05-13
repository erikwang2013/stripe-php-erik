<?php

/**
 * Stripe Webman 插件安装器
 *
 * 遵循 webman 基础插件规范（WEBMAN_PLUGIN 标记）：
 *   webman 启动时自动发现标记了 WEBMAN_PLUGIN 的类，
 *   并从插件中加载配置，无需手动操作。
 *
 * Follows webman basic plugin conventions (WEBMAN_PLUGIN marker):
 *   webman auto-discovers classes with WEBMAN_PLUGIN on boot,
 *   loading plugin config automatically — no manual steps needed.
 *
 * 手动安装/卸载（可选）：
 *   \Stripe\Webman\Install::install();
 *   \Stripe\Webman\Install::uninstall();
 */
namespace Stripe\Webman;

class Install
{
    /**
     * webman 插件标识常量
     * webman plugin marker constant
     */
    const WEBMAN_PLUGIN = true;

    /**
     * 获取 webman 项目根目录
     * Resolve webman project root directory.
     */
    private static function basePath(): string
    {
        if (function_exists('base_path')) {
            return base_path();
        }
        // 在非 webman 环境或 composer script 运行时，使用当前工作目录
        // Fallback to CWD when base_path() isn't available
        return getcwd() ?: dirname(__DIR__, 4);
    }

    /**
     * 安装：将配置文件拷贝到 webman 配置目录
     * Install: copy config file to webman config directory
     */
    public static function install(): void
    {
        $source = __DIR__ . '/../../config/stripe.php';
        $targetDir = self::basePath() . '/config/plugin/stripe';

        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }

        $target = $targetDir . '/app.php';

        // 仅在目标文件不存在时拷贝，避免覆盖用户自定义配置
        // Only copy if target doesn't exist, to preserve user customizations
        if (!file_exists($target) && file_exists($source)) {
            copy($source, $target);
        }
    }

    /**
     * 卸载：清理配置文件
     * Uninstall: clean up config files
     */
    public static function uninstall(): void
    {
        $targetDir = self::basePath() . '/config/plugin/stripe';

        if (is_dir($targetDir)) {
            $appConfig = $targetDir . '/app.php';
            if (file_exists($appConfig)) {
                unlink($appConfig);
            }
            @rmdir($targetDir);
        }
    }
}
