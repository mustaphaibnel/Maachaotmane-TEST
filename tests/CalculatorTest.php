<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CalculatorTest extends WebTestCase
{
    public function testMultiply(): void
    {
        $client = static::createClient();
        $client->request('POST', '/calculate',[],[],
        ['CONTENT_TYPE'=>'application/json'],
        json_encode([
            'operation' => 'multiply',
            'a' => 6,
            'b' => 7
        ]));

        $this->assertResponseIsSuccessful();
        $responseData = json_decode($client->getResponse()->getContent(),true);
        $this->assertArrayHasKey('result', $responseData);
        $this->assertEquals(42, $responseData['result']);
    }
}
