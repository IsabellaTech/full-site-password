<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4e7fd6827d7662810172b29ff86a609d
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Carbon_Fields\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Carbon_Fields\\' => 
        array (
            0 => __DIR__ . '/..' . '/htmlburger/carbon-fields/core',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4e7fd6827d7662810172b29ff86a609d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4e7fd6827d7662810172b29ff86a609d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4e7fd6827d7662810172b29ff86a609d::$classMap;

        }, null, ClassLoader::class);
    }
}