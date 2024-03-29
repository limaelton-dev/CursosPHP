<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0eff48dd5d6c41243ba7eb83775db005
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Alura\\Pdo\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Alura\\Pdo\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit0eff48dd5d6c41243ba7eb83775db005::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0eff48dd5d6c41243ba7eb83775db005::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0eff48dd5d6c41243ba7eb83775db005::$classMap;

        }, null, ClassLoader::class);
    }
}
