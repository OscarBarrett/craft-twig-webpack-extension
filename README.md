# Twig Webpack Extension plugin for Craft CMS 2.x

A plugin that provides https://github.com/fullpipe/twig-webpack-extension

## Requirements

The Craft 2 version has only been tested with Craft 2.6.

## Installation

To install the plugin, follow these instructions.

1. Download the latest release for Craft 2 from here:

        https://github.com/OscarBarrett/craft-twig-webpack-extension/releases/tag/craft-2

2. Unzip the folder and rename it to `twigwebpackextension`. Then move it to your `craft/plugins` directory.

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for Twig Webpack Extension.

## Configuration

Create a file at `craft/config/twigwebpackextension.php`.

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
