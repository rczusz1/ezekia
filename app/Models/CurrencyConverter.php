<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CurrencyConverter extends Model
{
    /**
     * @param $currencyFrom
     * @param $currencyTo
     * @param $amount
     * @return string
     */
    public static function exchange($currencyFrom, $currencyTo, $amount) : array
    {
        $access_key='b8999d50aba92a39ddbf9bab1a4be5b9';
        $url = "http://api.exchangeratesapi.io/v1/convert";

        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET', $url, [
            'query' => [
                'access_key' => $access_key,
                'from'       => $currencyFrom,
                'to'         => $currencyTo,
                'amount'     => $amount,
        ]]);

        $data = [];
        if ($response->getStatusCode() === 200) {
            $data = json_decode($response->getBody(), true); // returns an array
        }
        return $data;
    }
}
