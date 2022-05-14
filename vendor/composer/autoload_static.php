<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfb4a9710925773dfe5d16260e600432d
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
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitfb4a9710925773dfe5d16260e600432d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfb4a9710925773dfe5d16260e600432d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitfb4a9710925773dfe5d16260e600432d::$classMap;

        }, null, ClassLoader::class);
    }
}
