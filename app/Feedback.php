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
	public static function getData()
	{
		$feedbacks = new Feedback;

        switch (request('filter')) {
            case 'unread':
                $feedbacks = $feedbacks->where('read_at', null);
                break;

            case 'bug':
                $feedbacks = $feedbacks->where('feedback_kategori_id', 1);
                break;

            case 'masukan':
                $feedbacks = $feedbacks->where('feedback_kategori_id', 2);
                break;

            case 'pertanyaan':
                $feedbacks = $feedbacks->where('feedback_kategori_id', 3);
                break;
            
            default:
               
                break;
        }

        switch (request('sort')) {
            case 'terbaru':
                $feedbacks = $feedbacks->latest();
                break;

            case 'terbaru':
                $feedbacks = $feedbacks->oldest();
                break;
            
            default :
                $feedbacks = $feedbacks->latest();
                break;
        }

        $feedbacks = $feedbacks->paginate(10);

        return $feedbacks->appends(request()->except('page'));
	}

	public function readStatus()
	{
		return empty($this->read_at) ? '' : 'text-muted';
	}

	public function checkRead()
	{
		if ($this->read_at == null) {
			$this->update([
				'read_at' => \Carbon\Carbon::now(),
			]);
		}

		return true;
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
		return substr($this->isi, 0, 30);
	}

    protected $guarded = ['id'];
    protected $dates = ['read_at'];
}
