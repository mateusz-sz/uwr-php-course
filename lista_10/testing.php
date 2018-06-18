<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 6/6/18
 * Time: 8:06 PM
 */

require_once __DIR__ . "/vendor/autoload.php";
require_once "config/bootstrap.php";

use Transaction\Transaction;
use TransactionRepository\TransactionRepository;
use TransactionFinder\TransactionFinder;
use Money\Money;
use Money\Currency;
use TransactionStatus\Status;



$transactionExample = new Transaction(
    new Money(234, new Currency('USD')),
    "PKO-BP-654292",
    "Alior-264728",
    Status::ACTIVE()
);

$transactionExample2 = new Transaction(
    new Money(1523, new Currency('PLN')),
    "T-mobileBank-26543",
    "Bz-Wbk-46543245",
    Status::BLOCKED()
);


$transactionRepository = new TransactionRepository($entity_manager, $DBALConnection);

$transactionRepository->save($transactionExample);
$transactionRepository->save($transactionExample2);


$transactionRepository->get("2c323e4f-a7e9-43ad-b924-fdefe05b9281");

