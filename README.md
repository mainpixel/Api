Laravel Mainpixel Api
====================
Laravel API was created by, and is maintained by [Mr. J. del Luna](https://github.com/paperclamp), and is a [MainpixelV4](https://www.mainpixel.io) bridge for [Laravel 5](http://laravel.com). Feel free to check out the [change log](CHANGELOG.md).

## Index

- Installation
- Configuration
- Usage
- Webhosting
    - Webcontainers
        - [List webcontainers](#list-all-webcontainers)
        - [Show webcontainer](#show-webcontainer)
        - [Store webcontainer](#store-webcontainer)
        - [Update webcontainer](#update-webcontainer)
        - [Remove webcontainer](#destroy-webcontainer)
    - Domains
        - [List domains](#list-all-domains)
        - [Show domain](#show-domain)
        - [Update domain](#update-domain)
        - [Remove domain](#destroy-domain)
    - Email Accounts
        - [List accounts](#list-all-email-accounts)
        - [Show account](#show-email-account)
        - [Update account](#update-email-acount)
        - [Remove account](#destroy-email-acount)
    - Email Forwarder
        - [List accounts](#list-all-email-accounts)
        - [Show account](#show-email-account)
        - [Update account](#update-email-acount)
        - [Remove account](#destroy-email-acount)
    - Email Catchalls
        - [List accounts](#list-all-email-accounts)
        - [Show account](#show-email-account)
        - [Update account](#update-email-acount)
        - [Remove account](#destroy-email-acount)
    


## Installation

[PHP](https://php.net) 7+ are required.

[Laravel](https://laravel.com) 5.2+ are required.

To get the latest version of Laravel Mainpixel, simply require the project using [Composer](https://getcomposer.org):

```bash
$ composer require mainpixelbv/laravel-mainpixel
```

Instead, you may of course manually update your require block and run `composer update` if you so choose:

```json
{
    "require": {
        "mainpixelbv/laravel-mainpixel": "^1.0"
    }
}
```

Once Laravel Mainpixel is installed, you need to register the service provider. Open up `config/app.php` and add the following to the `providers` key.

* `'mainpixelbv\laravel-mainpixel\MainpixelApiServiceProvider'`

You can register the Mainpixel facade in the `aliases` key of your `config/app.php` file if you like.

* `'MPAPI' => 'mainpixelbv\laravel-mainpixel\MainpixelApi'`

## Configuration

Laravel Mainpixel requires connection configuration.

To get started, you'll need to publish all vendor assets:

```bash
$ php artisan vendor:publish
```

This will create a `config/MainpixelApi.php` file in your app that you can modify to set your configuration. Also, make sure you check for changes to the original config file in this package between releases.

## Usage
Add a `namespace` by choosing the right type, like `Containers`, `Databases`, `Contacts`

```php
use Mainpixel\Api\Types\Hosting\{type};
```

## Hosting

### Webcontainers 

`use Mainpixel\Api\Types\Hosting\Containers;`

During the building process of Mainpixel we took a whole new concept together. We wanted to issolate each website/platform from eachother. So we builded a container management platform where each website/platform is hosted in a seperate webcontainer. Those webcontainers can be automatically moved arround all connected nodes for the best performance and scalability solution.

#### List all webcontainers

```php
public function index(Containers $containers) {
    $list = $containers->list();
}
```

```json
{
    "0" : {
        "protected" : {
            "identifier" : "UNIQUE-CONTAINER-ID",
            "created_at" : "UNIX-TIMESTAMP",
            "updated_at" : "UNIX-TIMESTAMP",
            "dns_general_state" : "DOMAINS-DNS-STATE (true/false)"
        },
        "data" : {
            "general" : {
              "name" : "CONTAINER-NAME",
              "type" : "TYPE (like: wordpress, magento, laravel etc..)",
              "note" : "NOTE",
              "php" : "PHP-VERSION (default 7)"
            }
        },
        "domains" : {
            "0" : {
                "DOMAIN-ID" : "DOMAIN-INCL-TLD"
            },                                                    
        },
        "amount" : {
            "domains" : "NUMBER-OF-DOMAINS",
            "email" : "NUMBER-OF-EMAIL-ACCOUNTS/FORWARDERS/CATCHALLS",
            "databases" : "NUMBER-OF-DATABASES"
        },
    },
    "1" : {
        
    }
}
```

#### Show Webcontainer

```php
public function show($containerID,Containers $containers) {
    $show = $containers->show([
        'identifier' => 'CONTAINER-IDENTIFIER'
    ]);
}
```

```json
{
    "protected" : {
        "identifier" : "UNIQUE-CONTAINER-ID",
        "created_at" : "UNIX-TIMESTAMP",
        "updated_at" : "UNIX-TIMESTAMP",
    },
    "data" : {
        "general" : {
          "name" : "CONTAINER-NAME",
          "type" : "TYPE (like: wordpress, magento, laravel etc..)",
          "note" : "NOTE",
          "php" : "PHP-VERSION (default 7)"
        }
    },
}
```

#### Store Webcontainer

```php
public function store($containerID,Containers $containers) {
    $show = $containers->add([
        'identifier' => 'CONTAINER-IDENTIFIER',
        'data' => [
            'general' => [
                'name' => 'CONTAINER-NAME',
                'type' => 'TYPE (like: wordpress, magento, laravel etc..)',
                'note' => 'NOTE',
                'php' => 'PHP-VERSION'
            ],
        ]
    ]);
}
```

```json
{
    "status" : "error/success",
    "message" : "RETURNED-MESSAGE",
}
```

#### Update Webcontainer

```php
public function update($containerID,Containers $containers) {
    $show = $containers->update([
        'identifier' => 'CONTAINER-IDENTIFIER',
        'data' => [
            'general' => [
                'name' => 'CONTAINER-NAME',
                'type' => 'TYPE (like: wordpress, magento, laravel etc..)',
                'note' => 'NOTE',
                'php' => 'PHP-VERSION'
            ],
        ]
    ]);
}
```

```json
{
    "status" : "error/success",
    "message" : "RETURNED-MESSAGE",
}
```

#### Destroy Webcontainer

```php
public function store($containerID,Containers $containers) {
    $show = $containers->remove([
        'identifier' => 'CONTAINER-IDENTIFIER',
    ]);
}
```

```json
{
    "status" : "error/success",
    "message" : "RETURNED-MESSAGE",
}
```

## Domains 

`use Mainpixel\Api\Types\Hosting\Domains;`

A webcontainer listening to specific connected domains. When you add a domain, the server-cluster will 
automaticly adopt and updates the webcontainer ninx serverblock. We added some great functionalities to 
our API like DNS states and DNS management

#### List all domains

```php
public function index(Domains $domains) {
    $list = $domain->list([
        'identifier' => 'WEBCONTAINER-ID'
    ]);
}
```

```json
{
    "0" : {
        "protected" : {
            "identifier" : "UNIQUE-DOMAIN-ID",
            "created_at" : "UNIX-TIMESTAMP",
            "updated_at" : "UNIX-TIMESTAMP"
        },
        "data" : {
            "domain" : "example',
            "tld" : "com"
        },
        "dns" : {
            "state" : "NS-SERVER-CONNECTED (true/false)",
            "records" : {}
        },
    },
    "1" : {
    
    }
}
```






