<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CitiesController extends Controller
{
    public function index()
    {
        $cities = City::all();

        return response()->json([
            'success' => true,
            'message' =>'List Semua City',
            'data'    => $cities
        ], 200);
    }

    public function store(Request $request)
	{
	    $validator = Validator::make($request->all(), [
	        'cityName'    => 'required',
	        'country' 	  => 'required',
	        'description' => 'required',
	    ]);

	    if ($validator->fails()) {

	        return response()->json([
	            'success' => false,
	            'message' => 'Semua Kolom Wajib Diisi!',
	            'data'    => $validator->errors()
	        ],401);

	    } else {

	        $city = City::create([
	            'cityName'    => $request->input('cityName'),
	            'country'     => $request->input('country'),
	        	'description' => $request->input('description'),
	        ]);

	        if ($city) {
	            return response()->json([
	                'success' => true,
	                'message' => 'City Berhasil Disimpan!',
	                'data' 	  => $city
	            ], 201);
	        } else {
	            return response()->json([
	                'success' => false,
	                'message' => 'City Gagal Disimpan!',
	            ], 400);
	        }

	    }
	}

	public function show($id)
	{
	   $city = City::find($id);

	   if ($city) {
	       return response()->json([
	           'success'   => true,
	           'message'   => 'Detail City!',
	           'data'      => $city
	       ], 200);
	   } else {
	       return response()->json([
	           'success' => false,
	           'message' => 'City Tidak Ditemukan!',
	       ], 404);
	   }
	}

	public function update(Request $request, $id)
	{
	    $validator = Validator::make($request->all(), [
	        'cityName'    => 'required',
	        'country' 	  => 'required',
	        'description' => 'required',
	    ]);

	    if ($validator->fails()) {

	        return response()->json([
	            'success' => false,
	            'message' => 'Semua Kolom Wajib Diisi!',
	            'data'    => $validator->errors()
	        ],401);

	    } else {

	        $city = City::whereId($id)->update([
	            'cityName'     => $request->input('cityName'),
	            'country'      => $request->input('country'),
	            'description'  => $request->input('description'),
	        ]);

	        if ($city) {
	            return response()->json([
	                'success' => true,
	                'message' => 'City Berhasil Diupdate!',
	                'data' 	  => $city
	            ], 201);
	        } else {
	            return response()->json([
	                'success' => false,
	                'message' => 'City Gagal Diupdate!',
	            ], 400);
	        }

	    }
	}

	public function destroy($id)
	{
	    $city = City::whereId($id)->first();
		$city->delete();

	    if ($city) {
	        return response()->json([
	            'success' => true,
	            'message' => 'City Berhasil Dihapus!',
	        ], 200);
	    }
	}
}