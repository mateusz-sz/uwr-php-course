<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 4/20/18
 * Time: 9:11 AM
 */

namespace Events;


class Wallet_deactivated extends Events
{

    /**
     * Wallet_deactivated constructor.
     * @param $id
     * @param $when
     * @param $reason
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