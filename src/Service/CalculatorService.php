<?php

namespace App\Service;

use App\DTO\CalculationRequestDTO;
use InvalidArgumentException;

class CalculatorService {
    
    public function calculate(CalculationRequestDTO $dto)
    {
       switch ($dto->operation)
       {
        case 'add': return $dto->a + $dto->b;
        case 'subtract': return $dto->a - $dto->b;
        case 'multiply': return $dto->a * $dto->b;
        case 'divide':
            if ($dto->b == 0) throw new InvalidArgumentException("Division by zero");
            return $dto->a / $dto->b;
        default:
            throw new InvalidArgumentException("Invalid operation");
       }
    }

}