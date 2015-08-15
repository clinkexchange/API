<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Illuminate\Pagination\Paginator;
use CLINK\Transformers\CurrenciesTransformer;
use Response;
use App\Http\Controllers\ApiController;
use App\Currencies;

class CurrenciesController extends Controller
{
    /**
     * @var CLINK\Transformers\CurrenciesTransformer
     */
    protected $currenciesTransformer;

    function __construct(CurrenciesTransformer $currenciesTransformer)
    {
        $this->currenciesTransformer = $currenciesTransformer;
    }

    public function index()
    {     
        $currencies = Currencies::all();

        return ["data" => $this->currenciesTransformer->transformCollection($currencies->all())];


    }


}
