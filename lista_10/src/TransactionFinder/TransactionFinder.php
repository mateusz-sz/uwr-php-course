<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 6/6/18
 * Time: 8:50 PM
 */

namespace TransactionFinder;
use Doctrine\ORM\EntityManager;
use Transaction\Transaction;

class TransactionFinder implements ITransactionFinder
{
    /**
     * @var EntityManager
     */
    private $entityManager;
    private $transactionRepository;
    private $transactions;

    /**
     * TransactionFinder constructor.
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    public function findAll(int $limit = 10, int $offset = 0)
    {
        $this->transactionRepository = $this->entityManager->getRepository('transactions');
        /* @var $products Transaction[] */
        $this->transactions = $this->transactionRepository->findAll();

        for($i = 0; $i < $limit; $i++) {
            echo sprintf("-%s\n", $this->transactions[$i]->getName());
        }
    }
}