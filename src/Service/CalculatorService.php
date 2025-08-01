<?php

namespace App\Service;

use App\DTO\CalculationRequestDTO;
use App\DAO\CalculationHistoryDAO;
use InvalidArgumentException;

class CalculatorService 
{
    public function __construct(private CalculationHistoryDAO $historyDAO) {}

    public function calculate(CalculationRequestDTO $dto)
    {
       switch ($dto->operation) {
            case 'add':
                $result = $dto->a + $dto->b;
                break;
            case 'subtract':
                $result = $dto->a - $dto->b;
                break;
            case 'multiply':
                $result = $dto->a * $dto->b;
                break;
            case 'divide':
                if ($dto->b == 0) {
                    throw new \InvalidArgumentException("Division by zero");
                }
                $result = $dto->a / $dto->b;
                break;
            default:
                throw new \InvalidArgumentException("Invalid operation");
        }

        $this->historyDAO->save($dto->operation, $dto->a, $dto->b, $result);

        return $result;
    }

}