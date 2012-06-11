<?php

use Symfony\Component\ClassLoader\UniversalClassLoader;
use Doctrine\Common\Annotations\AnnotationRegistry;

$loader = new UniversalClassLoader();
$loader->registerNamespaces(array(
    'Symfony'                          => array(__DIR__.'/../vendor/symfony/src', __DIR__.'/../vendor/bundles'),
    'Wed'                              => __DIR__.'/../src',
    'Doctrine\\Common'                 => __DIR__.'/../vendor/doctrine-common/lib',
    'Doctrine\\Common\\DataFixtures'   => __DIR__.'/../vendor/doctrine-data-fixtures/lib',
    'Doctrine\\DBAL\\Migrations'       => __DIR__.'/../vendor/doctrine-migrations/lib',
    'Doctrine\\DBAL'                   => __DIR__.'/../vendor/doctrine-dbal/lib',
    'Doctrine'                         => __DIR__.'/../vendor/doctrine/lib',
    'Assetic'                          => __DIR__.'/../vendor/assetic/src',
    'Monolog'                          => __DIR__.'/../vendor/monolog/src',
    'Metadata'                         => __DIR__.'/../vendor/metadata/src',
));
$loader->registerPrefixes(array(
    'Twig_Extensions_'   => __DIR__.'/../vendor/twig-extensions/lib',
    'Twig_'              => __DIR__.'/../vendor/twig/lib',
));

// intl
if (!function_exists('intl_get_error_code')) {
    require_once __DIR__.'/../vendor/symfony/src/Symfony/Component/Locale/Resources/stubs/functions.php';

    $loader->registerPrefixFallbacks(array(__DIR__.'/../vendor/symfony/src/Symfony/Component/Locale/Resources/stubs'));
}

$loader->registerNamespaceFallbacks(array(
    __DIR__.'/../src',
));
$loader->register();

AnnotationRegistry::registerLoader(function($class) use ($loader) {
    $loader->loadClass($class);
    return class_exists($class, false);
});

AnnotationRegistry::registerFile(__DIR__.'/../vendor/doctrine/lib/Doctrine/ORM/Mapping/Driver/DoctrineAnnotations.php');



// Swiftmailer needs a special autoloader to allow
// the lazy loading of the init file (which is expensive)
require_once __DIR__.'/../vendor/swiftmailer/lib/classes/Swift.php';
Swift::registerAutoload(__DIR__.'/../vendor/swiftmailer/lib/swift_init.php');