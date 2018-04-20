<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 4/20/18
 * Time: 9:28 AM
 */

namespace Events;
use \Money\Money;


class Money_deposited extends Events
{
    private $amount;

    /**
     * Money_deposited constructor.
     * @param $id
     * @param $when
     * @param $amount
     */
    public function __construct($id, $when, Money $amount)
    {
        parent::__construct($id, $when, "");
        $this->amount = $amount;
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

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

}
