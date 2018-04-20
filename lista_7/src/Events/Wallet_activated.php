<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 4/20/18
 * Time: 8:38 AM
 */

namespace Events;


class Wallet_activated extends Events
{
    /**
     * Wallet_activated constructor.
     * @param $reason
     * @param $id
     * @param $when
     */
    public function __construct($id, $when, $reason)
    {
        parent::__construct($id, $when, $reason);
    }

    /**
     * @return mixed
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getWhen()
    {
        return $this->when;
    }
}