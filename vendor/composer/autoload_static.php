<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6b9eca00531efe2e45becd2c7b964c1f
{
    public static $prefixLengthsPsr4 = array (
        'd' => 
        array (
            'duzun\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'duzun\\' => 
        array (
            0 => __DIR__ . '/..' . '/duzun/hquery/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'h' => 
        array (
            'hQuery' => 
            array (
                0 => __DIR__ . '/..' . '/duzun/hquery/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6b9eca00531efe2e45becd2c7b964c1f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6b9eca00531efe2e45becd2c7b964c1f::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit6b9eca00531efe2e45becd2c7b964c1f::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
