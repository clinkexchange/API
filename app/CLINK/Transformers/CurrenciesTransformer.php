<?php

namespace CLINK\Transformers;

class CurrenciesTransformer extends Transformer{


    public function  transform($item)
    {
        return [
            'country' => $item['country'],
            'currency_name' => $item['currency_name'],
            'currency_symbol' => $item['currency_symbol'],
            'currency_id' => $item['currency_id']
        ];
    }
}