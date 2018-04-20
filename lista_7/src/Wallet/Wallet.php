<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 4/19/18
 * Time: 4:44 PM
 */

namespace Wallet;

use Events\Money_deposited;
use Events\Money_withdrew;
use Events\Wallet_activated;
use Events\Wallet_deactivated;
use Money\Money;
use Money\Currency;
use \Exception;

class Wallet
{
    private $id;
    private $balance;
    private $activationStatus;
    private $events;


    /**
     * Wallet constructor.
     * @param string $currency
     */
    public function __construct(string $currency)
    {
        $this->id = time() . rand(1000, 9999);
        $this->balance = new Money(0, new Currency($currency));
        $this->activationStatus = false;
        $this->events = array();
    }

    public static function fromEvents(array $events): Wallet
    {
        $wallet = new self("USD");

        foreach($events as $event) {
            $objectName = get_class($event);
            $wallet->id = $event->getId();

            switch($objectName) {
                case Wallet_activated::class:
                    $wallet->activate($event->getReason());
                    break;
                case Wallet_deactivated::class:
                    $wallet->deactivate($event->getReason());
                    break;
                case Money_withdrew::class:
                    $wallet->withdraw($event->getAmount());
                    break;
                case Money_deposited::class:
                    $wallet->deposit($event->getAmount());
                    break;
            }
        }
        return $wallet;
    }

    //TODO: Implement canDeposit() function
    public function deposit(Money $moneyToDeposit)
    {
        if($this->activationStatus) {
            $this->balance = $this->balance->add($moneyToDeposit);
            $DepositEvent = new Money_deposited($this->id, time(), $moneyToDeposit);
            array_push($this->events, $DepositEvent);
        }
        else if ($moneyToDeposit->getAmount() < 0) {
            throw new Exception("Nie można zdeponować ujemnej kwoty!");
        }
        else {
            throw new Exception("Konto jest nieaktywne!");
        }
    }

    public function withdraw(Money $moneyToWithdraw)
    {
        if($this->activationStatus) {
            $balanceAfterWithdraw = $this->balance->subtract($moneyToWithdraw);

            if($balanceAfterWithdraw->getAmount() < 0) {
                throw new Exception("Za mało środków na koncie!");
            }
            else {
                $this->balance  = $balanceAfterWithdraw;

                $withdrawEvent = new Money_withdrew($this->id, time(), $moneyToWithdraw);
                array_push($this->events, $withdrawEvent);
            }
        }
        else {
            throw new Exception("Konto jest nieaktywne!");
        }
    }

    public function deactivate(string $reason)
    {
        if( $this->activationStatus ) {
            $this->activationStatus = false;

            $deactivationEvent = new Wallet_deactivated($this->id, time(), $reason);
            array_push($this->events, $deactivationEvent);
        }
        else {
            throw new Exception("Konto jest nieaktywne!");
        }
    }

    public function activate(string $reason)
    {
        if( !($this->activationStatus) ) {
            $this->activationStatus = true;

            $activationEvent = new Wallet_activated($this->id, time(), $reason);
            array_push($this->events, $activationEvent);
        }
        else {
            throw new Exception("Konto już jest aktywne.");
        }
    }

    public function getBalance(): Money
    {
        return $this->balance;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return bool
     */
    public function getActivationStatus(): bool
    {
        return $this->activationStatus;
    }

    /**
     * @return array
     */
    public function getEvents(): array
    {
        return $this->events;
    }



}
