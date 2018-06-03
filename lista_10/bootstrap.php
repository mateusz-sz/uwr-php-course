<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 5/31/18
 * Time: 10:53 PM
 */

require_once "vendor/autoload.php";

// Setup Doctrine
$configuration = Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(
    $paths = [__DIR__ . '/src/Transaction'],
    $isDevMode = true
);

// Setup connection parameters
$connection_parameters = [
    'dbname' => 'transaction_repository',
    'user' => 'postgres',
    'password' => 'password',
    'host' => 'localhost',
    'driver' => 'pdo_pgsql'
];

// Get the entity manager
$entity_manager = Doctrine\ORM\EntityManager::create($connection_parameters, $configuration);




