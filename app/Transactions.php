<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Transactions extends Model
{
    //assign primary key field name.
	protected $primaryKey = 'tran_id';
    
    protected $fillable = ['user_id','amount', 'dwp_from_id', 'dwp_to_id', 'ce_from', 'ce_to', 'ce_total_amount' , 'ce_exchangerate_value'];

    public function user()
	{
		return $this->belongsTo('App\User');
	}
}
