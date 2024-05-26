NucleosMatomoBundle
===================
[![Latest Stable Version](https://poser.pugx.org/nucleos/matomo-bundle/v/stable)](https://packagist.org/packages/nucleos/matomo-bundle)
[![Latest Unstable Version](https://poser.pugx.org/nucleos/matomo-bundle/v/unstable)](https://packagist.org/packages/nucleos/matomo-bundle)
[![License](https://poser.pugx.org/nucleos/matomo-bundle/license)](https://packagist.org/packages/nucleos/matomo-bundle)

[![Total Downloads](https://poser.pugx.org/nucleos/matomo-bundle/downloads)](https://packagist.org/packages/nucleos/matomo-bundle)
[![Monthly Downloads](https://poser.pugx.org/nucleos/matomo-bundle/d/monthly)](https://packagist.org/packages/nucleos/matomo-bundle)
[![Daily Downloads](https://poser.pugx.org/nucleos/matomo-bundle/d/daily)](https://packagist.org/packages/nucleos/matomo-bundle)

[![Continuous Integration](https://github.com/nucleos/NucleosMatomoBundle/actions/workflows/continuous-integration.yml/badge.svg?event=push)](https://github.com/nucleos/NucleosMatomoBundle/actions?query=workflow%3A"Continuous+Integration"+event%3Apush)
[![Code Coverage](https://codecov.io/gh/nucleos/NucleosMatomoBundle/graph/badge.svg)](https://codecov.io/gh/nucleos/NucleosMatomoBundle)
[![Type Coverage](https://shepherd.dev/github/nucleos/NucleosMatomoBundle/coverage.svg)](https://shepherd.dev/github/nucleos/NucleosMatomoBundle)

This bundle provides a wrapper for using the [matomo] (Piwik) statistic inside the symfony sonata-project.

## Installation

Open a command console, enter your project directory and execute the following command to download the latest stable version of this bundle:

```
composer require nucleos/matomo-bundle
# To define a default http client and message factory
composer require symfony/http-client nyholm/psr7
```

### Enable the Bundle

Then, enable the bundle by adding it to the list of registered bundles in `config/bundles.php` file of your project:

```php
// config/bundles.php

return [
    // ...
    Nucleos\MatomoBundle\NucleosMatomoBundle::class => ['all' => true],
];
```

### Assets

It is recommended to use [webpack](https://webpack.js.org/) / [webpack-encore](https://github.com/symfony/webpack-encore)
to include the `MatomoTable.js` file in your page. These file is located in the `assets` folder.

You can use [npm](https://www.npmjs.com/) or [yarn](https://yarnpkg.com/) to load the library:

## Usage

Define a http client in your configuration.

```yaml
# config/packages/nucleos_matomo.yaml

nucleos_matomo:
    http:
        client: 'httplug.client'
        message_factory: 'nyholm.psr7.psr17_factory'

```

### Render tracking code

```twig
{{ sonata_block_render({ 'type': 'nucleos_matomo.block.tracker' }, {
    'host': 'http://matomo.example.com',
    'site': 1
}) }}
```

### Render statistic graph

```twig
{{ sonata_block_render({ 'type': 'nucleos_matomo.block.statistic' }, {
    'host': 'http://matomo.example.com',
    'site': 1,
    'token': 'MATOMO_API_TOKEN'
}) }}
```

## License

This bundle is under the [MIT license](LICENSE.md).

[matomo]: https://matomo.org
