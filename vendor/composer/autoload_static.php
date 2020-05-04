<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7372607eaefe6db09118ef4de05b3e28
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Saladin\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Saladin\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7372607eaefe6db09118ef4de05b3e28::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7372607eaefe6db09118ef4de05b3e28::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
