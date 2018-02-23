# Twig Webpack Extension plugin for Craft CMS 3.x

A plugin that provides https://github.com/fullpipe/twig-webpack-extension

## Requirements

This plugin requires Craft CMS 3.0.0-beta.23 or later.

## Installation

To install the plugin, follow these instructions.

1. Open your terminal and go to your Craft project:

        cd /path/to/project

2. Then tell Composer to load the plugin:

        composer require OscarBarrett/craft-twig-webpack-extension

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for Twig Webpack Extension.

## Configuration

Create a file at `craft/config/twig-webpack-extension.php`.

If your assets and manifest are in the same directory, simply set `outputDir`:

```
return [
    'outputDir' => '<outputDir>'
];
```

Alternatively, you can set each parameter separately:

```
return [
    'manifestPath' => <outputDir>/manifest.json',
    'jsPath' => '<jsOutputDir>/',
    'cssPath' => '<cssOutputDir>/'
];
```

The plugin can also be configured from the CMS.


## Usage

See https://github.com/fullpipe/twig-webpack-extension
