<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class UserCurrencies extends Model
{
    //assign primary key field name.
	protected $primaryKey = 'uc_id';
    
    protected $fillable = ['current_balance', 'user_id', 'currency_id'];

    public function user()
	{
		return $this->belongsTo('App\User');
	}
}
