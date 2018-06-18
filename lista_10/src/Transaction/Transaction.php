<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 6/6/18
 * Time: 7:31 PM
 */

namespace Transaction;

use Ramsey\Uuid\Uuid;
use Money\Money;
use TransactionStatus\Status;

/**
 * @Entity
 * @Table(name="transactions")
 */
class Transaction
{
    /**
     * @var Uuid
     *
     * @Id
     * @Column(type="uuid", unique=true)
     * @GeneratedValue(strategy="CUSTOM")
     * @CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
     */
    private $Uuid;

    /**
     * @var Money
     *
     * @Column(type="object")
     */
    private $amount;

    /**
     * @var string
     *
     * @Column(type="string")
     */
    private $fromAccount;

    /**
     * @var string
     *
     * @Column(type="string")
     */
    private $toAccount;

    /**
     * @var Status
     *
     * Klasa Status rozszerza klasę Enum z biblioteki myclabs/php-enum i reprezentuje jeden ze statusów konta:
     * - ACTIVE
     * - BLOCKED
     * - SUSPENDED
     * - CLOSED
     *
     * @Column(type="object")
     */
    private $status;

    /**
     * Transaction constructor.
     * @param Money $amount
     * @param string $fromAccount
     * @param string $toAccount
     * @param Status $status
     */
    public function __construct(Money $amount, string $fromAccount, string $toAccount, Status $status)
    {
        $this->amount = $amount;
        $this->fromAccount = $fromAccount;
        $this->toAccount = $toAccount;
        $this->status = $status;
    }

    /**
     * @param Uuid $Uuid
     */
    public function setUuid(Uuid $Uuid): void
    {
        $this->Uuid = $Uuid;
    }

    /**
     * @return Money
     */
    public function getAmount(): Money
    {
        return $this->amount;
    }

    /**
     * @param Money $amount
     */
    public function setAmount(Money $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return string
     */
    public function getFromAccount(): string
    {
        return $this->fromAccount;
    }

    /**
     * @param string $fromAccount
     */
    public function setFromAccount(string $fromAccount): void
    {
        $this->fromAccount = $fromAccount;
    }

    /**
     * @return string
     */
    public function getToAccount(): string
    {
        return $this->toAccount;
    }

    /**
     * @param string $toAccount
     */
    public function setToAccount(string $toAccount): void
    {
        $this->toAccount = $toAccount;
    }

    /**
     * @return Status
     */
    public function getStatus(): Status
    {
        return $this->status;
    }

    /**
     * @param Status $status
     */
    public function setStatus(Status $status): void
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getUuid()
    {
        return $this->Uuid;
    }


}
