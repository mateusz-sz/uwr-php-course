<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 5/31/18
 * Time: 9:07 PM
 */

namespace Transaction;

use Doctrine\ORM\Mapping as ORM;
//use Money\Money;
//use Ramsey\Uuid\Uuid;
//use MyClabs\Enum\Enum;

/**
 * @ORM\Entity(repositoryClass="TransactionRepository\TransactionRepository")
 * @ORM\Table(name="transactions")
 *
 */
class Transaction
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;

    /**
     * @Column(type="string")
     */
    private $amount;

    /**
     * @Column(type="string")
     */
    private $fromAccount;

    /**
     * @Column(type="string")
     */
    private $toAccount;

    /**
     * @Column(type="string")
     */
    private $status;



    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set amount.
     *
     * @param string $amount
     *
     * @return Transaction
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount.
     *
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set fromAccount.
     *
     * @param string $fromAccount
     *
     * @return Transaction
     */
    public function setFromAccount($fromAccount)
    {
        $this->fromAccount = $fromAccount;

        return $this;
    }

    /**
     * Get fromAccount.
     *
     * @return string
     */
    public function getFromAccount()
    {
        return $this->fromAccount;
    }

    /**
     * Set toAccount.
     *
     * @param string $toAccount
     *
     * @return Transaction
     */
    public function setToAccount($toAccount)
    {
        $this->toAccount = $toAccount;

        return $this;
    }

    /**
     * Get toAccount.
     *
     * @return string
     */
    public function getToAccount()
    {
        return $this->toAccount;
    }

    /**
     * Set status.
     *
     * @param string $status
     *
     * @return Transaction
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }
}
