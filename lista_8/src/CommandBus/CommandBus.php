<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 5/23/18
 * Time: 7:26 PM
 */

namespace CommandBus;
use Router\Router;
use Command\Command;

class CommandBus
{
    private $router;

    /**
     * CommandBus constructor.
     * @param array $handlers
     */
    public function __construct(Array $handlers)
    {
        $this->router = new Router($handlers);
    }

    /**
     * @param Command $command
     * @throws \NoRouteFoundException\NoRouteFoundException
     */
    public function dispatch(Command $command)
    {
        //Ustal przy pomocy routera jaki handler wywołać
        $targetHandler = $this->router->commandToHandler($command);

        //Stwórz instancję właściwego handlera
        $handler = new $targetHandler;

        //Wywołaj handler na zadanej komendzie
        $handler($command);
    }
}