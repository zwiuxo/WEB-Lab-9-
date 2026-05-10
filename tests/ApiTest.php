<?php
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

class ApiTest extends TestCase {
    public function testMockRequest() {
        $mock = new MockHandler([
            new Response(200, [], 'OK')
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $response = $client->get('/check-status');
        $this->assertEquals(200, $response->getStatusCode());
    }
}
