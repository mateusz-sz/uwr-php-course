<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 6/3/18
 * Time: 4:18 PM
 */

use Doctrine\ORM\Tools\Console\ConsoleRunner;
require_once 'bootstrap.php';

return ConsoleRunner::createHelperSet($entity_manager);
