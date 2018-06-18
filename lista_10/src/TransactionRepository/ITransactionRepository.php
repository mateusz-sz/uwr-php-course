<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 6/6/18
 * Time: 8:36 PM
 */

namespace TransactionRepository;

use Transaction\Transaction;

interface ITransactionRepository
{
    /**
     * @param string $transactionId
     * @return Transaction
     */
    public function get(string $transactionId): Transaction;

    /**
     * @param Transaction $transaction
     */
    public function save(Transaction $transaction): void;
}