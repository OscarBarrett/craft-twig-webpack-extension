<?php
/**
 * Twig Webpack Extension plugin for Craft CMS 3.x
 *
 * A plugin that provides https://github.com/fullpipe/twig-webpack-extension
 *
 * @link      https://github.com/OscarBarrett/craft-twig-webpack-extension
 * @copyright Copyright (c) 2018 Oscar Barrett
 */

namespace OscarBarrett\CraftTwigWebpackExtension\models;

use OscarBarrett\CraftTwigWebpackExtension\TwigWebpackExtension;

use Craft;
use craft\base\Model;

/**
 * @author    Oscar Barrett
 * @package   CraftTwigWebpackExtension
 * @since     1.0.0
 */
class Settings extends Model
{
    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $outputDir = '/resources';

    /**
     * @var string
     */
    public $manifestPath = '';

    /**
     * @var string
     */
    public $jsPath = '';

    /**
     * @var string
     */
    public $cssPath = '';

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['outputDir', 'manifestPath', 'jsPath', 'cssPath'], 'string']
        ];
    }
}
