<?php
/**
 * Twig Webpack Extension plugin for Craft CMS 3.x
 *
 * A plugin that provides https://github.com/fullpipe/twig-webpack-extension
 *
 * @link      https://github.com/OscarBarrett/craft-twig-webpack-extension
 * @copyright Copyright (c) 2018 Oscar Barrett
 */

namespace OscarBarrett\CraftTwigWebpackExtension;

use OscarBarrett\CraftTwigWebpackExtension\models\Settings;

use Fullpipe\TwigWebpackExtension\WebpackExtension;

use Craft;
use craft\base\Plugin;

/**
 * Class TwigWebpackExtension
 *
 * @author    Oscar Barrett
 * @package   CraftTwigWebpackExtension
 * @since     1.0.0
 *
 */
class TwigWebpackExtension extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var TwigWebpackExtension
     */
    public static $plugin;

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $schemaVersion = '1.0.0';

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        $settings = $this->getSettings();
        if (!$settings->validate()) {
            throw new InvalidConfigException('Twig Webpack Extension plugin has invalid settings');
        }

        $webroot = Craft::getAlias('@webroot');

        if ($settings->outputDir) {
            $manifestPath = "{$webroot}/{$settings->outputDir}/manifest.json";
            $outputPath = "{$settings->outputDir}/";
            Craft::$app->view->registerTwigExtension(
                new WebpackExtension($manifestPath, $outputPath, $outputPath)
            );
        } else {
            $manifestPath = "${webroot}/{$settings->manifestPath}";
            Craft::$app->view->registerTwigExtension(
                new WebpackExtension($manifestPath, $settings->jsPath, $settings->cssPath)
            );
        }
    }


    // Protected Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    protected function createSettingsModel()
    {
        return new Settings();
    }

    /**
     * @inheritdoc
     */
    protected function settingsHtml(): string
    {
        return Craft::$app->view->renderTemplate(
            'twig-webpack-extension/settings',
            [
                'settings' => $this->getSettings()
            ]
        );
    }
}
