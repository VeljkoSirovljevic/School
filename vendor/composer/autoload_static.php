<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit598fa9e4e37a6e243042805b81d111f3
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit598fa9e4e37a6e243042805b81d111f3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit598fa9e4e37a6e243042805b81d111f3::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
