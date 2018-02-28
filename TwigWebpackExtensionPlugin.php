<?php
/**
 * Twig Webpack Extension plugin for Craft CMS 2.x
 *
 * A plugin that provides https://github.com/fullpipe/twig-webpack-extension
 *
 * @link      https://github.com/OscarBarrett/craft-twig-webpack-extension
 * @copyright Copyright (c) 2018 Oscar Barrett
 */

namespace Craft;

use Fullpipe\TwigWebpackExtension\WebpackExtension;

/**
 * Class TwigWebpackExtensionPlugin
 *
 * @author    Oscar Barrett
 * @package   CraftTwigWebpackExtension
 * @since     1.0.0
 *
 */
class TwigWebpackExtensionPlugin extends BasePlugin
{
    // Static Properties
    // =========================================================================

    // Public Properties
    // =========================================================================

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return Craft::t('Twig Webpack Extension');
    }

    /**
     * @inheritdoc
     */
    public function getVersion()
    {
        return '1.0.1';
    }

    /**
     * @inheritdoc
     */
    public function getDeveloper()
    {
        return 'Oscar Barrett';
    }

    /**
     * @inheritdoc
     */
    public function getDeveloperUrl()
    {
        return 'https://github.com/OscarBarrett/craft-twig-webpack-extension';
    }

    /**
     * @inheritdoc
     */
    public function addTwigExtension()
    {
        require_once 'vendor/autoload.php';

        $settings = craft()->plugins->getPlugin('twigwebpackextension')->getSettings();
        if (!$settings->validate()) {
            throw new InvalidConfigException('Twig Webpack Extension plugin has invalid settings');
        }

        $settings = array_merge(get_object_vars($settings), [
            'outputDir'     => craft()->config->get('outputDir', 'twigwebpackextension'),
            'manifestPath'  => craft()->config->get('manifestPath', 'twigwebpackextension'),
            'jsPath'        => craft()->config->get('jsPath', 'twigwebpackextension'),
            'cssPath'       => craft()->config->get('cssPath', 'twigwebpackextension')
        ]);

        if ($settings['outputDir']) {
            $manifestPath = CRAFT_BASE_PATH . "../{$settings['outputDir']}/manifest.json";
            $outputPath = "{$settings['outputDir']}/";
            return new WebpackExtension($manifestPath, $outputPath, $outputPath);
        } else {
            $manifestPath = CRAFT_BASE_PATH . "../{$settings['manifestPath']}";
            return new WebpackExtension($manifestPath, $settings['jsPath'], $settings['cssPath']);
        }
    }

    /**
     * @inheritdoc
     */
    public function getSettingsHtml()
    {
        return craft()->templates->render(
            'twigwebpackextension/settings',
            [
                'settings' => $this->getSettings()
            ]
        );
    }

    // Protected Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    protected function defineSettings()
    {
        return [
            'outputDir' => [
                AttributeType::String,
                'default' => '/resources'
            ],
            'manifestPath' => [
                AttributeType::String,
                'default' => ''
            ],
            'jsPath' => [
                AttributeType::String,
                'default' => ''
            ],
            'cssPath' => [
                AttributeType::String,
                'default' => ''
            ]
        ];
    }
}
