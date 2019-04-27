<?php


namespace Accounts;


use Exception;

class GamificationAccount
{
    private $id;
    private $eMail;
    private $description;
    private $pointBalance;
    private $status;

    /**
     * GamificationAccount constructor.
     * @param string $email
     * @param string $description
     */
    public function __construct(string $email, string $description = "")
    {
        $this->id = time() . rand(10, 99);
        $this->eMail = $email;
        $this->description = $description;
        $this->pointBalance = 0;
        $this->status = true;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getEMail(): string
    {
        return $this->eMail;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return bool
     */
    public function isStatus(): bool
    {
        return $this->status;
    }



    /**
     * @return mixed
     */
    public function getPointBalance(): int
    {
        return $this->pointBalance;
    }


    /**
     * @param int $points
     * @throws Exception
     */
    public function topUpPoints(int $points): void
    {
        if($points < 0) {
            throw new Exception("Negative number as points top up value given!");
        }
        else {
            $this->pointBalance += $points;
        }
    }

    /**
     * @param bool $status
     */
    public function setStatus(bool $status): void
    {
        $this->status = $status;
    }
}