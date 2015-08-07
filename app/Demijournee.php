<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Demijournee extends Model {

	protected $table = 'demijournees';

	protected $fillable = ['date', 'periode', 'reservation_id'];

	public function reservation()
    {
        return $this->belongsTo('App\Reservation');
    }

	public function getDateAttribute($value)
    {
		setlocale(LC_TIME, 'french');
        return utf8_encode(Carbon::createFromFormat('Y-m-d', $value)->formatLocalized('%A %d %B %Y'));
    }

	public function getPeriodeAttribute($value)
	{
		switch ($value) {
			case 'am':
				return 'Matin';
				break;

			case 'pm':
				return 'Après-midi';
				break;

			default:
				return 'Valeur incorrecte';
				break;
		}

	}
}
