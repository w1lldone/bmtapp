<?php

namespace App\Helper;

use Illuminate\Support\Facades\Storage;

/**
* 
*/
class Uploader
{

	public static function upload($name, $location){

		if (empty(request()->file($name))) {
			return null;
		}

		$store = request()->file($name)->store($location, 'uploads');
		$image = request()->file($name)->hashName();

		$foto = "/uploads/$location/$image";

		return $foto;
	}

	public static function replace($name, $location, $oldfile){

		$foto = Uploader::upload($name, $location);

		if (!is_null($oldfile)){
			$oldpath = substr($oldfile, 9);
			Storage::disk('uploads')->delete($oldpath);
		} 

		return $foto;

	}

	public static function remove($location)
	{
		$filepath = substr($location, 9);
		Storage::disk('uploads')->delete($filepath);
		return true;
	}
	

}