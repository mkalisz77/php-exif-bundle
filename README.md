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

By default native exif reader is used but you can use [ExitTool](http://www.sno.phy.queensu.ca/~phil/exiftool/)

add to app config these lines for this feature

### Custom 

```
#app/config/config.yml
evlz_php_exif:
    type: native # default value oexiftool
```

*Notice: lib-exiftool is required*
