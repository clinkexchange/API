<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExchangeRate extends Model
{
    //assign primary key field name.
	protected $primaryKey = 'er_id';
    
    protected $fillable = ['current_exchange_rate_value', 'currency_id'];

    public function currencies()
	{
		//return $this->belongsTo('App\User');
	}
}
