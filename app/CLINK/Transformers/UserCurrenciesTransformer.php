<?php

namespace CLINK\Transformers;

class UserCurrenciesTransformer extends Transformer{


    public function  transform($item)
    {
        return [
            'user_id' => $item['user_id'],
            'current_balance' => $item['current_balance'],
            'currency_id' => $item['currency_id']
        ];
    }
}