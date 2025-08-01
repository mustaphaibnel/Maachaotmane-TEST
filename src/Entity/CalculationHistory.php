<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "calculation_history")]
class CalculationHistory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 50)]
    private string $operation;

    #[ORM\Column(type: 'float')]
    private float $a;

    #[ORM\Column(type: 'float')]
    private float $b;

    #[ORM\Column(type: 'float')]
    private float $result;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOperation(): string
    {
        return $this->operation;
    }

    public function setOperation(string $operation): self
    {
        $this->operation = $operation;
        return $this;
    }

    public function getA(): float
    {
        return $this->a;
    }

    public function setA(float $a): self
    {
        $this->a = $a;
        return $this;
    }

    public function getB(): float
    {
        return $this->b;
    }

    public function setB(float $b): self
    {
        $this->b = $b;
        return $this;
    }

    public function getResult(): float
    {
        return $this->result;
    }

    public function setResult(float $result): self
    {
        $this->result = $result;
        return $this;
    }
}
