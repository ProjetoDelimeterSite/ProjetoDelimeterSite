<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitdcf281c7db0efcfd1e37d302f3dcf770
{
    public static $prefixLengthsPsr4 = array (
        'H' => 
        array (
            'Htdocs\\Src\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Htdocs\\Src\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitdcf281c7db0efcfd1e37d302f3dcf770::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitdcf281c7db0efcfd1e37d302f3dcf770::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitdcf281c7db0efcfd1e37d302f3dcf770::$classMap;

        }, null, ClassLoader::class);
    }
}
