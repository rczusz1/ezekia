<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\CurrencyConverter;

class CurrencyConverterTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExchange()
    {
        $reflectionMethod = new \ReflectionMethod(CurrencyConverter::class, 'exchange');
        $reflectionMethod->setAccessible(true);

        $result = $reflectionMethod->invoke(new CurrencyConverter(), 'GBP', 'USD', 1);

        $this->assertTrue(is_array($result));
        $this->assertTrue(0 < $result);

    }
}
