<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 5/23/18
 * Time: 8:03 PM
 */

namespace Router;
use Command\Command;
use NoRouteFoundException\NoRouteFoundException;

class Router implements IRouter
{
    private $availableHandlers;

    /**
     * Router constructor.
     * @param array $handlers
     */
    public function __construct(Array $handlers)
    {
        $this->availableHandlers = $handlers;
    }

    /**
     * @param Command $command
     * @return mixed
     * @throws NoRouteFoundException
     */
    public function commandToHandler(Command $command)
    {
        $commandName = get_class($command);

        if( array_key_exists($commandName, $this->availableHandlers) ) {
            return $this->availableHandlers[$commandName];
        }
        else {
            throw new NoRouteFoundException('No such command!');
        }
    }
}