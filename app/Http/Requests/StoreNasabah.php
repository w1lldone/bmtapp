<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\nasabah;

class StoreNasabah extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'username' => 'required|alpha_dash|unique:nasabahs',
            'password' => 'required|confirmed',
            'kontak' => 'required',
            'alamat' => 'required',
            'cabang_id' => 'required|numeric',
        ];
    }
}
