<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf2d28a2464e53d81d48b524fd0bdf895
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf2d28a2464e53d81d48b524fd0bdf895::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf2d28a2464e53d81d48b524fd0bdf895::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf2d28a2464e53d81d48b524fd0bdf895::$classMap;

        }, null, ClassLoader::class);
    }
}
