<?php

namespace App\Controller;

use App\DAO\CalculationHistoryDAO;
use App\DTO\CalculationRequestDTO;
use App\Service\CalculatorService;
use App\Transformer\CalculationResultTransformer;
use InvalidArgumentException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\AsController;

#[AsController] // Add this attribute
class CalculatorController extends AbstractController
{
    private $service;
    private $transformer;

    public function __construct(CalculatorService $service, CalculationResultTransformer $transformer)
    {
        $this->service = $service;
        $this->transformer = $transformer;
    }
    public function calculate(Request $request)
    {
       try{
        $dto = new CalculationRequestDTO(json_decode($request->getContent(), true));
        $result = $this->service->calculate($dto);

        return new JsonResponse($this->transformer->transform($result));
       }catch(InvalidArgumentException $e)
       {
        return new JsonResponse(['error' => $e->getMessage()], 400);
       }
    }

    public function history(CalculationHistoryDAO $historyDAO): JsonResponse
    {
        $histories = $historyDAO->getAll();

        $data = array_map(function ($history) {
            return [
                'operation' => $history->getOperation(),
                'a' => $history->getA(),
                'b' => $history->getB(),
                'result' => $history->getResult(),
            ];
        }, $histories);

        return new JsonResponse($data);
    }

}