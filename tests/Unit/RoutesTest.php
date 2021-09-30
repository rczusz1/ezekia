<?php

namespace tests\app\Http\Controllers;

use Tests\TestCase;
use App\Service;
use App\Models\Category;
use App\Http\Controllers\AdminController;



class RoutesTest extends TestCase
{
    private $urlNames = [
        '/',
        '/users',
        '/get-user/7',
        'get-user/7/GBP',
        '/user/create/new',
        '/user/store',
        '/currency-convert/GBP/USD/100',
    ];

    /**
     * Test web routes
     *
     * @return void
     */
    public function testRoutes()
    {
        foreach ($this->urlNames as $urlName) {
            $responseGet = $this->call('GET', $urlName);
            if ($responseGet->isOk() === true || !in_array($responseGet->getStatusCode(), [500, 405, 302])) {
                $this->assertTrue($responseGet->isOk());
            } else {
                $this->assertFalse($responseGet->isOk());
            }
            $responsePost = $this->call('POST', $urlName);
            if ($responsePost->isOk() === true || !in_array($responsePost->getStatusCode(), [500, 405, 302])) {
                $this->assertTrue($responsePost->isOk());
            } else {
                $this->assertFalse($responsePost->isOk());
            }
        }
    }
}