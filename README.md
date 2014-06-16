# Data Replicator #

Utility for replicating data to another DB.

[![Latest Stable Version](https://poser.pugx.org/ebidtech/data-replicator/v/stable.png)](https://packagist.org/packages/ebidtech/data-replicator)

## Requirements ##

* PHP >= 5.3

## Installation ##

The recommended way to install is through composer.

Just create a `composer.json` file for your project:

``` json
{
    "require": {
        "ebidtech/data-replicator": "@stable"
    }
}
```

**Tip:** browse [`ebidtech/data-replicator`](https://packagist.org/packages/ebidtech/data-replicator) page to choose a stable version to use, avoid the `@stable` meta constraint.

And run these two commands to install it:

```bash
$ curl -sS https://getcomposer.org/installer | php
$ composer install
```

Now you can add the autoloader, and you will have access to the library:

```php
<?php

require 'vendor/autoload.php';
```

## Usage ##

Have a look on [tests as example](tests/EBT/DataReplicator/Tests/DataReplicatorTest.php).

## Contributing ##

See CONTRIBUTING file.

## Credits ##

* Ebidtech developer team, data-replicator
* [All contributors](https://github.com/ebidtech/data-replicator/contributors)

## License ##

data-replicator library is released under the MIT License. See the bundled LICENSE file for details.

