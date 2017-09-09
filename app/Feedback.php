<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
	/*RELATION METHOD*/
	public function nasabah(){
		return $this->belongsTo('App\Nasabah');
	}

	public function feedback_kategori(){
		return $this->belongsTo('App\FeedbackKategori');
	}

	/*CUSTOM METHOD*/
	public function readStatus()
	{
		return empty($this->read_at) ? '' : 'text-muted';
	}

	public function kategoriColor()
	{
		switch ($this->feedback_kategori->name) {
			case 'Bug':
				$color = 'danger';
				break;

			case 'Pertanyaan':
				$color = 'warning';
				break;

			case 'Masukan':
				$color = 'info';
				break;
		}

		if ($this->read_at != null) {
			$color .= ' fade';
		}

		return $color;
	}

	public function isiReduced()
	{
		return substr($this->isi, 0, 50);
	}
    
    protected $guarded = ['id'];
}
