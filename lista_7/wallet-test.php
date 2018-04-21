<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 4/20/18
 * Time: 1:04 PM
 */

require __DIR__ . "/vendor/autoload.php";

use Money\Money;
use Money\Currency;
use Wallet\Wallet;

function displayWallet(Wallet $wallet) {
    echo PHP_EOL;
    echo "Wallet id: " . $wallet->getId() . PHP_EOL;
    echo "Balance: "
        . $wallet->getBalance()->getAmount() . " "
        . $wallet->getBalance()->getCurrency() . PHP_EOL;
    if($wallet->getActivationStatus()) {
        echo "Activation status: active" . PHP_EOL;
    } else {
        echo "Activation stasus: inactive" . PHP_EOL;
    }
}


//Creating wallet-tester
$wallet = new Wallet('USD');
displayWallet($wallet);

try {
    echo "Próba zdeponowania środków - ";
    $wallet->deposit(new Money(500, new Currency('USD')));
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . PHP_EOL;
}
displayWallet($wallet);

try {
    $wallet->activate("Otworzenie konta");
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . PHP_EOL;
}
displayWallet($wallet);

try {
    $wallet->deposit(new Money(500, new Currency('USD')));
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . PHP_EOL;
}
displayWallet($wallet);

try {
    $wallet->withdraw(new Money(1000, new Currency('USD')));
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . PHP_EOL;
}
displayWallet($wallet);

try {
    $wallet->withdraw(new Money(100, new Currency('USD')));
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . PHP_EOL;
}
displayWallet($wallet);
echo PHP_EOL;

$eventsArray = $wallet->getEvents();

$wallet_from_events = Wallet::fromEvents($eventsArray);
echo "Wallet utworzony z eventów, zapisanych z poprzedniego: ";
displayWallet($wallet_from_events);
