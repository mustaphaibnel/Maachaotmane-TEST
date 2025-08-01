<?php

namespace App\DAO;

use App\Entity\CalculationHistory;
use Doctrine\ORM\EntityManagerInterface;

class CalculationHistoryDAO
{
    public function __construct(private EntityManagerInterface $em) {}

    public function save(string $operation, float $a, float $b, float $result): void
    {
        $history = new CalculationHistory();
        $history->setOperation($operation);
        $history->setA($a);
        $history->setB($b);
        $history->setResult($result);

        $this->em->persist($history);
        $this->em->flush();
    }

    /**
     * @return CalculationHistory[]
     */
    public function getAll(): array
    {
        return $this->em->getRepository(CalculationHistory::class)
            ->findBy([]);
    }
}
