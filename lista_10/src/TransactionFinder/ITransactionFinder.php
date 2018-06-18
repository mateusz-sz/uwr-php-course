<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 6/6/18
 * Time: 8:49 PM
 */

namespace TransactionFinder;

interface ITransactionFinder
{
    public function findAll(int $limit = 10, int $offset = 0);
}