<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model {
	
	protected $table = 'reservations';

	public function user()
    {
        return $this->belongsTo('App\User');
    }
	
	public function velo()
    {
        return $this->belongsTo('App\Velo');
    }

}
