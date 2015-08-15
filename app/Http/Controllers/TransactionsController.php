<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Illuminate\Pagination\Paginator;
use CLINK\Transformers\TransactionsTransformer;
use Response;
use App\Http\Controllers\ApiController;
use App\Transactions;
use App\User;
use Auth;
use DB;

class TransactionsController extends ApiController
{
    /**
     * @var CLINK\Transformers\UserCurrenciesTransformer
     */
    protected $transactionsTransformer;

    function __construct(TransactionsTransformer $transactionsTransformer)
    {
        $this->transactionsTransformer = $transactionsTransformer;
    }

    public function index()
    {     
        $transactions = Transactions::all();

        return ["data" => $this->transactionsTransformer->transformCollection($transactions->all())];
    }

    public function store(Request $request)
    {
        Transactions::create(Input::all());

        return $this->respondCreated('Transaction successfully created.');
    }


}
