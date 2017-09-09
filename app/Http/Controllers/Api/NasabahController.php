<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Validator;
use App\Nasabah;

class NasabahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    public function error($validator){
        $errors = $validator->errors();
        $response = [
            'error' => true,
            'status' => $errors->first(),
        ];
        return $response;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nasabah $nasabah)
    {
        if (!empty($request->name)) {
           $nasabah->update(request(['name', 'alamat', 'kontak']));

            return response()->json([
                'error' => false,
                'status' => 'success',
            ]);
        }

        // ganti username
        if (!empty($request->username)) { 

            $validator = Validator::make($request->all(), [
                'username' => 'unique:nasabahs',
            ]);

            if ($validator->fails()) {
                return response()->json($this->error($validator));
            }

            $nasabah->update(request(['username']));

            return response()->json([
                'error' => false,
                'status' => 'success',
            ]);

        }

        if (!empty($request->newpassword)) {

            if (Hash::check($request->password, $nasabah->password)) {

                $validator = Validator::make($request->all(), [
                    'newpassword' => 'confirmed',
                ]);

                if ($validator->fails()) {
                    return response()->json($this->error($validator));
                }

                $nasabah->update([
                        'password' => Hash::make(request('newpassword')),
                ]);

                return response()->json([
                    'error' => false,
                    'status' => 'success',
                ]);
            }else return response()->json([
                'error' => true,
                'status' => 'password tidak sama',
            ]);
        }
       
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function lapak(Nasabah $nasabah){
        $lapak = $nasabah->lapak;
        
        return $lapak->load('nasabah');
    }
}
