## Laravel TodoList

![tasks](https://github.com/mudassarali964/laravel-todolist/assets/55048197/075d02be-7450-448d-8d19-a383993ede9a)

## Installation

Add the following code in composer.json file:

```shell
"repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/mudassarali964/laravel-todolist"
        }
    ],
```

Require this package with composer. It is recommended to only require the package for development.

```shell
composer require mudassarali964/laravel-todolist
```

## Usage

You can now add messages using the Facade (when added), using the PSR-3 levels (debug, info, notice, warning, error, critical, alert, emergency):

```php
$ php artisan migrate
```

If migrated successfully, simply move to the given link:
http://127.0.0.1:8000/tasks

You can publish the views by the artisan command:

```php
$ php artisan vendor:publish --tag=views
```

You can publish the config/todolist by the artisan command:

```php
$ php artisan vendor:publish --tag=config
```
