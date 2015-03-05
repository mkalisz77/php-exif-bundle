# PHP Exif reader Bundle# 

Symfony bundle for [PHPExif - A PHP Exif reader](https://github.com/Miljar/php-exif)

## Install ##

### Add to composer

```
$ composer require evlz/php-exif-bundle:~0.1
```

### Add to the kernel ###

```php
<?php
# app/AppKernel.php

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            # your bundles
            new Evlz\PhpEXIFBundle\EvlzPhpEXIFBundle(),            
        );
    }
}
```
### add to config

```
#app/config/config.yml
evlz_php_exif:
    type: native # or exiftool
```

if you
