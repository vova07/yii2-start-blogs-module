Yii2-Start blogs module.
========================
This module provide a blogs managing system for Yii2-Start application.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist vova07/yii2-start-blogs-module "*"
```

or add

```
"vova07/yii2-start-blogs-module": "*"
```

to the require section of your `composer.json` file.

Configuration
=============

- Add module to config section:

```
'modules' => [
    'blogs' => [
        'class' => 'vova07\blogs\Module'
    ]
]
```

- Run migrations:

```
php yii migrate --migrationPath=@vova07/blogs/migrations
```

- Run RBAC command:

```
php yii blogs/rbac/add
```
