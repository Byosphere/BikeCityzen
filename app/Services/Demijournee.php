<?php namespace App\Services;
	
	use Carbon\carbon;
	
	class Demijournee {
		
		public function toText($txt)
		{
			$tab = explode('-', $txt);
			$date = Carbon::createFromTimeStamp($tab[0])->toDateString();
			$tab[1]=='m'?$day = 'matin' : $day = 'après-midi';
			return $date.' '.$day;			
		}
		
	}