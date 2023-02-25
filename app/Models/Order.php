<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $fillable = [
		'first_name','last_name','street_address','street_address2','pincode','city','state','phone_number','whatsapp_number',
	];

	public function detail()
    {
        //return $this->belongsTo('App\Models\OrderDetail');
    }
}
?>