<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 5/23/18
 * Time: 7:18 PM
 */

namespace Command;

abstract class Command
{
    /**
     * @var \DateTime
     */
    private $created;

    /**
     * Command constructor.
     */
    public function __construct()
    {
        $this->created = getdate();
    }

    //abstract public function execute();
}