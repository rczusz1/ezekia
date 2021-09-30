<?php

namespace Tests\Feature;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Tests\TestCase;
use \tests\Unit\PHPUnitUtil;
use App\Http\Controllers\EzekiaUsersController;
class EzekiaUsersControllerTest extends TestCase
{


    public function providerConvert()
    {
        return array(
            array('JPY', 'GBP', 1, 'Currencies not allowed, please check your URL'),
            array('USD', 'GBP', 1, 0),
        );
    }


    /**
     * A currency conversion test.
     *
     * @dataProvider providerConvert
     * @return void
     */
    public function testConvert($currency_from, $currency_to, $amount, $expected) {
        $controller = new EzekiaUsersController();
        $result = $controller->convert($currency_from, $currency_to, $amount);
        if (is_string($expected)) {
            $this->assertSame($expected, $result);
        } else {
            $this->assertTrue($expected < $result);
        }
    }

    /**
     * A currency conversion test.
     *
     * @return void
     */
    public function testStoreUser() {
        $controller = new EzekiaUsersController();
        $request = new Request();
        $result = $controller->storeUser($request);
        $this->assertTrue($result instanceof RedirectResponse);
    }

    /**
     *
     * @return void
     */
    public function testGetUser() {
        $reflectionMethod = new \ReflectionMethod(EzekiaUsersController::class, 'getUser');
        $reflectionMethod->setAccessible(true);

        $result = $reflectionMethod->invoke(new EzekiaUsersController(), 2);

        $this->assertTrue($result instanceof \Illuminate\View\View);
    }

}
