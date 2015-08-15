<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Illuminate\Pagination\Paginator;
use CLINK\Transformers\UserCurrenciesTransformer;
use Response;
use App\Http\Controllers\ApiController;
use App\UserCurrencies;
use App\User;
use Auth;
use DB;

class UserCurrenciesController extends ApiController
{
    /**
     * @var CLINK\Transformers\UserCurrenciesTransformer
     */
    protected $userCurrenciesTransformer;

    function __construct(UserCurrenciesTransformer $userCurrenciesTransformer)
    {
        $this->userCurrenciesTransformer = $userCurrenciesTransformer;
    }

    public function index()
    {     
        $userCurrencies = UserCurrencies::all();

        return ["data" => $this->userCurrenciesTransformer->transformCollection($userCurrencies->all())];
    }

    public function store(Request $request)
    {
        $cid = Input::get('currency_id');
        $uid = Input::get('user_id');
        $currency = UserCurrencies::where('user_id','=',$uid)
        ->where('currency_id','=',$cid);

        if($currency->count() > 0)
        {
            return $this->respondWithError('This currency already on your list.');
        }

        UserCurrencies::create(Input::all());

        return $this->respondCreated('User currency successfully created.');
    }


}
