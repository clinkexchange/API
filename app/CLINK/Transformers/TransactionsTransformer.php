<?php

namespace CLINK\Transformers;

class TransactionsTransformer extends Transformer{


    public function  transform($item)
    {
        return [
            'user_id' => $item['user_id'],
            'type' => $item['type'],
            'amount' => $item['amount'],
            'ce_from' => $item['ce_from'],
            'ce_to' => $item['ce_to'],
            'ce_total_amount' => $item['ce_total_amount'],
            'dwp_from_id' => $item['dwp_from_id'],
            'dwp_to_id' => $item['dwp_to_id']
        ];
    }
}