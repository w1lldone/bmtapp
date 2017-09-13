<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminRoom extends Model
{
	/*RELATION SECTION*/
	public function admin_chat(){
		return $this->hasMany('App\AdminChat');
	}

	public function nasabah(){
		return $this->belongsTo('App\Nasabah');
	}

	/*CUSTOM METHOD SECTION*/

	public function getUnreadMessagesAttribute()
	{
		return $this->admin_chat()->where('read_at', null)->count();
	}

	public function getLastMessageAttribute()
	{
		if (empty($this->admin_chat->first())) {
			return '&nbsp;';
		} else {
			return substr($this->admin_chat()->latest()->first()->message, 0, 30);
		}
	}

	public static function getData()
	{
		$rooms = new AdminRoom;

		switch (request('filter')) {
			case 'unread':
				$rooms = $rooms->whereHas('admin_chat',function($query)
				{
					$query->where('read_at', null);
				});
				break;
			
			default:
				
				break;
		}

		if (request()->has('keyword')) {
			$keyword = request('keyword');
			$rooms = $rooms->whereHas('nasabah', function($query) use($keyword)
			{
				$query->where('name', 'LIKE', "%$keyword%");
			})->orWhereHas('admin_chat', function($query) use($keyword)
			{
				$query->where('message', 'LIKE', "%$keyword%");
			});
		}

		switch (request('sort')) {
			case 'terlama':
				$rooms = $rooms->orderBy('updated_at', 'asc');
				break;
			
			default:
				$rooms = $rooms->orderBy('updated_at', 'desc');
				break;
		}

		return $rooms->paginate(10)->appends(request()->except('page'));
	}


	public function read()
	{
		return $this->admin_chat()->where('read_at', null)->update(['read_at' => \Carbon\Carbon::now()]);
	}

    
    protected $guarded = ['id'];
    protected $dates = ['updated_at'];
}
