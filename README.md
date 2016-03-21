# Config
Config module for a PHP application

# Instalation

You can use composer to load this library.
```
"repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/xprt64/Config.git"
        }
	],
"require": {
        "xprt64/Config": "dev-master"
},

```

# Usage
In your bootstrap php file add something like this, to load configuration from two files:
1. a global/default php file, that contains configuration for all environments (production, developement etc)
2. an environment php file, containing specific configuration for current environment; path to this file is
specified in an environment variable

```php
    $configObjs = [];
    $configObjs[]    =    new \xprt64\Config\PhpFile(__DIR__ . '/../config/global.php');

    if(getenv('CRM_CONFIG'))//exemple: CRM_CONFIG=config/my-dev-machine.php
    {
        $localFile  =   __DIR__ . '/../' . getenv('CRM_CONFIG');

        if(is_readable($localFile))
            $configObjs[]    =    new \xprt64\Config\PhpFile($localFile);
    }

    \xprt64\Config\Application::setConfig(new Config\MergedConfigs(...$configObjs));
```
Then, in your application, use configuration options like this:

`echo \xprt64\Config\Application::get('username')` or `echo \xprt64\Config\Application::get('db', 'name')`

# Extensibility
You can implement `\xprt64\Config` with your own classes, that read configuration from any type of medium (ini, xml, yaml files or database)
without the need to modify your application.

The `\xprt64\Config\Application` is dependent only to `\xprt64\Config` interface (Dependency inversion principle).

# Dependencies
- PHP >= '7.0'

The only external dependencies are for dev & testing:
 - phpunit

To load all dependencies, use `composer install` in root directory

# Testing
The phpunit tests are located in tests/ folder. To run all the tests execute command in tests/ folder:

`tests/> ./vendor/bin/phpunit .`