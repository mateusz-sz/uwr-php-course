<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 6/1/18
 * Time: 12:09 AM
 */

use Doctrine\ORM\Tools\Console\ConsoleRunner;
require_once __DIR__ . '/bootstrap.php';

return ConsoleRunner::createHelperSet($entity_manager);