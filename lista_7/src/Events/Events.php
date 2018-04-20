<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 4/20/18
 * Time: 8:56 AM
 */

namespace Events;


class Events
{
    protected $id;
    protected $when;
    protected $reason;
    //TODO: remove $reason from parent class

    /**
     * Events constructor.
     * @param $when
     * @param $reason
     */
    public function __construct($id, $when, string $reason)
    {
        $this->id = $id;
        $this->when = $when;
        $this->reason = $reason;
    }


}