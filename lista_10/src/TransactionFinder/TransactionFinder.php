<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 5/31/18
 * Time: 9:23 PM
 */

namespace TransactionFinder;

interface TransactionFinder
{
    public function findAll(int $limit = 10, int $offset = 0);
}