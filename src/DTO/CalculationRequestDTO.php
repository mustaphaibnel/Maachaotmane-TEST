<?php
namespace App\DTO;

class CalculationRequestDTO {
    public string $operation;
    public float $a;
    public float $b;

    public function __construct(array $data)
    {
        $this->operation = $data['operation'];
        $this->a = $data['a'];
        $this->b = $data['b'];
    }

}