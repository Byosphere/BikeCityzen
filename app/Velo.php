<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Velo extends Model {

	protected $table = 'velos';

	protected $fillable = ['modele', 'image', 'categorie'];

	public function reservation()
	{
		return $this->hasMany('App\Reservation');
	}
}
