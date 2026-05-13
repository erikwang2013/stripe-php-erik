<?php

/**
 * Stripe Webman 插件安装器
 *
 * 遵循 webman 基础插件规范：
 *   安装时自动将配置文件拷贝到 {主项目}/config/plugin/erikwang2013/stripe-php-erik/
 *   webman 会自动识别该目录下的配置并合并到主配置中。
 *
 * Follows webman basic plugin conventions:
 *   Auto-copies config to {main-project}/config/plugin/ on install.
 *   webman auto-detects and merges plugin config into main config.
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
     * 安装回调：composer install/update 后自动执行
     * Install callback: runs after composer install/update
     */
    public static function install(): void
    {
        $source = __DIR__ . '/../../config/stripe.php';
        $targetBase = base_path() . '/config/plugin/erikwang2013/stripe-php-erik';

        if (!is_dir($targetBase)) {
            mkdir($targetBase, 0755, true);
        }

        $target = $targetBase . '/app.php';

        // 仅在目标文件不存在时拷贝，避免覆盖用户自定义配置
        // Only copy if target doesn't exist, to preserve user customizations
        if (!file_exists($target)) {
            copy($source, $target);
        }
    }

    /**
     * 卸载回调：composer remove 后自动执行
     * Uninstall callback: runs after composer remove
     */
    public static function uninstall(): void
    {
        $targetDir = base_path() . '/config/plugin/erikwang2013/stripe-php-erik';

        if (is_dir($targetDir)) {
            // 仅删除我们创建的文件，不删除用户可能添加的其他文件
            // Only remove files we created
            $appConfig = $targetDir . '/app.php';
            if (file_exists($appConfig)) {
                unlink($appConfig);
            }
            // 如果目录为空则删除
            @rmdir($targetDir);
            @rmdir(dirname($targetDir));
        }
    }
}
