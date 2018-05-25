<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 5/25/18
 * Time: 2:19 AM
 */

require_once __DIR__ . "/vendor/autoload.php";

use Command\PingCommand;
use Command\PongCommand;
use Handlers\PingHandler;
use Handlers\PongHandler;
use CommandBus\CommandBus;
use NoRouteFoundException\NoRouteFoundException;

$handlersArray = array(
    PingCommand::class => PingHandler::class,
    PongCommand::class => PongHandler::class
);
$commandBus = new CommandBus($handlersArray);


try {
    $commandBus->dispatch(new PingCommand());
    $commandBus->dispatch(new PongCommand());
} catch (NoRouteFoundException $e) {
    echo 'Caught exception: ' . $e->getMessage() . PHP_EOL;
}


