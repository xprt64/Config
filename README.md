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
    $configObj    =    new \Gik\Config\PhpFiles([__DIR__ . '/../config/global.php']);

    if(getenv('CRM_CONFIG'))//exemple: CRM_CONFIG=config/my-dev-machine.php
    {
        $localFile  =   __DIR__ . '/../' . getenv('CRM_CONFIG');

        if(is_readable($localFile))
            $configObj->appendFromFile($localFile);
    }

    \Gik\AppConfig::setConfig($configObj);
```
Then, in your application, use configuration options like this:

`echo \Gik\AppConfig::get('username')` or `echo \Gik\AppConfig::get('db', 'name')`
# Dependencies
The only dependencies are only for dev & testing:
 - phpunit

To load all dependencies, use `composer install` in root
# Testing
The phpunit tests are located in tests/ folder. To run all the tests execute command in tests/ folder:

`tests/> ./vendor/bin/phpunit .`