<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EzekiaUser;
use App\Models\CurrencyConverter;
use DB;
use Session;
use App\Http\Controllers\Rule;


class EzekiaUsersController extends Controller
{

    private array $allowedFromCurrencies = array('GBP', 'EUR', 'USD');
    private array $allowedToCurrencies = array('GBP', 'EUR', 'USD');

    /**
     * @return $this
     */
    public function home() {
        $users = EzekiaUser::select('*')->get()->all();

        return view('home')->with(['users' => $users]);
    }

    /**
     * @param Request $request
     * @return $this
     */
    public function getAllEzekiaUsers (Request $request) {
        $users = EzekiaUser::select('*')->get()->all();

        return view('home')->with(['users' => $users]);
    }

    /**
     * @param null $ezekia_user_id
     * @param null $currencyFrom
     * @param null $currencyTo
     * @return $this
     */
     public function getUserWitHourlyRatesConverted ($ezekia_user_id, $currencyTo) {
         $user = EzekiaUser::where('id', $ezekia_user_id)->get()->first();
         $user_with_converted_rates = [];
         if($user !== null) {
             $convert = CurrencyConverter::exchange($user->hourly_rate_currency, $currencyTo, $user->hourlyrate);
             $user_with_converted_rates = [];

             $user_with_converted_rates['id'] = $user['id'];
             $user_with_converted_rates['firstname'] = $user['firstname'];
             $user_with_converted_rates['lastname'] = $user->lastname;
             $user_with_converted_rates['email'] = $user->email;
             $user_with_converted_rates['hourlyrate'] = $convert['result'];
             $user_with_converted_rates['hourly_rate_currency'] = $currencyTo ?? 'GBP';
         }
         return view('user_details')->with(['user' => $user_with_converted_rates]);
     }

    /**
     * @param $ezekia_user_id
     * @return $this
     */
     protected function getUser ($ezekia_user_id) {
         $user = EzekiaUser::where('id', $ezekia_user_id)->get()->first();

         return view('user_details')->with(['user' => $user]);
     }

    /**
     * @param $link
     * @return $this|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function createUser($link)
    {
        if (!empty($link)) {
            return view('user_create');
        }
        else {
            $users = EzekiaUser::select('*')->get()->all();

            return view('home')->with(['users' => $users]);
        }
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function storeUser(Request $request) {

        $data = $request->except('_method','_token','submit');


//        dd($data);
        $validator = \Validator::make($request->all(), [
            'firstname'  => 'required|string|min:3',
            'lastname'   => 'required|string|min:3',
            'email'      => 'required|email',
            'hourly_rate_currency' =>  'required',
        ]);

        if ($validator->fails()) {
            return redirect()->Back()->withInput()->withErrors($validator);
        }

        if ($record = DB::table('ezekia_users')->insert($data)) {
            Session::flash('message', 'User Added Successfully!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('getAllEzekiaUsers');
        } else {
            Session::flash('message', 'Data not saved!');
            Session::flash('alert-class', 'alert-danger');
        }

         return Back();

    }

    /**
     * @param $currency_from
     * @param $currency_to
     * @param $amount
     * @return string
     */
    public function convert($currency_from, $currency_to, $amount) : string
    {

        if (in_array($currency_from, $this->allowedFromCurrencies)
            && in_array($currency_to, $this->allowedToCurrencies)) {
            $convert = CurrencyConverter::exchange($currency_from, $currency_to, $amount);

            return $convert['result'];
        }
         return 'Currencies not allowed, please check your URL';
    }
}
