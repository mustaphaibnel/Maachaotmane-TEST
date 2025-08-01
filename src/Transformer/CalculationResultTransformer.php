<?php
namespace App\Transformer;

class CalculationResultTransformer {
    public function transform(float $result)
    {
        return ['result' => $result];
    }

}