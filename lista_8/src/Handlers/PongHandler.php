<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 5/23/18
 * Time: 7:24 PM
 */

namespace Handlers;
use Command\PongCommand;

class PongHandler
{
    public function __invoke(PongCommand $command)
    {
        echo 'PONG!' . PHP_EOL;
    }
}