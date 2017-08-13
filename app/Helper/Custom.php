<?php

namespace App\Helper;

/**
* 
*/
class Custom
{
    /**
    * split keyword into words and make whereRaw query form it
    *
    * @param  string  $coloumn
    * @param  string  $sentence
    * @return string
    */

    public static function keyword($sentence, $coloumn = 'name')
    {
        $query = '';
        $i = 0;
        $keywords = explode(' ', $sentence);
        foreach ($keywords as $keyword) {
            $query .= "$coloumn LIKE '%$keyword%'";

            $i++;

            if ($i != count($keywords)) {
                $query .= " OR ";
            }
        }

        return $query;
    }
}


	/**
	* split keyword into words and make whereRaw query form it
	*
	* @param  string  $coloumn
    * @param  string  $sentence
    * @return string
	*/
