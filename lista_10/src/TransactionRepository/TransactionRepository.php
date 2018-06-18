<?php
/**
 * Created by PhpStorm.
 * User: m
 * Date: 6/6/18
 * Time: 8:39 PM
 */

namespace TransactionRepository;

use Doctrine\ORM\EntityManager;
use Doctrine\DBAL\DriverManager;
use Transaction\Transaction;

class TransactionRepository implements ITransactionRepository
{
    /**
     * @var EntityManager
     */
    private $entityManager;
    private $DBALConnection;

    /**
     * TransactionRepository constructor.
     * @param EntityManager $entityManager
     * @param $DBALConnection
     */
    public function __construct(EntityManager $entityManager, $DBALConnection)
    {
        $this->entityManager = $entityManager;
        $this->DBALConnection = $DBALConnection;
    }

    /**
     * @param string $transactionId
     * @return Transaction
     */
    public function get(string $transactionId): Transaction
    {
//        $database = "transaction_repository";
//        $dbconn = pg_connect("host=localhost port=5432 dbname=$database user=postgres password=password");
//        if(!$dbconn) {
//            echo "Failed to connecting to postgres database $database";
//            exit;
//        }
//        $result = pg_query_params($dbconn, "SELECT * FROM transactions WHERE uuid=$1", Array($transactionId));
//        $object = pg_fetch_object($result);
//        $transaction = new Transaction(
//            $object->uuid,
//            $object->amount,
//            $object->fromaccount,
//            $object->toaccount,
//            $object->status
//        );
//        pg_free_result($result);
//        pg_close($dbconn);
//
//        return $transaction;
        $sql = "SELECT * FROM transactions WHERE uuid=" . $transactionId;
        $result = $this->DBALConnection->query($sql);

        $object = pg_fetch_object($result);
        $transaction = new Transaction(
            $object->amount,
            $object->fromaccount,
            $object->toaccount,
            $object->status
        );
        $transaction->setUuid($object->uuid);

        return $transaction;
    }

    /**
     * @param Transaction $transaction
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function save(Transaction $transaction): void
    {
        $this->entityManager->persist($transaction);
        $this->entityManager->flush();
        echo "Transaction with id: " . $transaction->getUuid() . " has been succesfully saved!" . PHP_EOL;
    }
}