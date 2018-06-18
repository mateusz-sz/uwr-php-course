<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 6/3/18
 * Time: 4:08 PM
 */

require_once __DIR__ . "/../vendor/autoload.php";
use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\DriverManager;

// Setup Doctrine
$configuration = Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration(
    $paths = [__DIR__ . '/../src/Transaction'],
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

//Register Uuid object type
Type::addType('uuid', 'Ramsey\Uuid\Doctrine\UuidType');


$config = new \Doctrine\DBAL\Configuration();
$DBALConnection = DriverManager::getConnection($connection_parameters, $config);



