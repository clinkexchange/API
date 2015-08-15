<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currencies extends Model
{
    //assign primary key field name.
	protected $primaryKey = 'currency_id';
    
    protected $fillable = ['country', 'currency_name', 'currency_symbol', 'is_default'];
}
