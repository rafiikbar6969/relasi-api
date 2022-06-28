<?php

namespace App\Http\Controllers\API;

use App\Models\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function index()
{
    // $data = Customer::all();
    // return response()->json($data, 200);
    // ni kalo banyak
    $data = Customer::with('order')->get();
    return response()->json($data, 200);

}

public function show($data){
    $data = Customer::with('order')->where('id', $data)->first();
    if(empty($data)){
        return response()->json([
            'pesan' => 'data tidak tersedia',
            'data' => $data
        ], 404);
    }
    
    return response()->json([
        'pesan' => 'data tersedia',
        'data' => $data
    ], 200);
}

public function add(Request $request){

    // proses validasi
    $validate = Validator::make($request->all(), [
    'name' => 'required',
    'phone' => 'required',
    'email' => 'required',
    'address' => 'required|min:5'
    ]);

    if($validate->fails()){
        return $validate->errors();
    }

    // proses simpan
    $data = Customer::create($request->all());
    return response()->json([
        'pesan' => 'data berhasil disimpan',
        'data' => $data
    ], 201);
}

public function destroy(Customer $id){


    $data = Customer::where('id',$id)->first();
        if(empty($data)){
        return response()->json([
            'pesan' => 'data tidak tersedia',
            'data' => $data
        ], 404);
    }

    $id->delete();
        return response()->json([
        'pesan' => 'data berhasil dihapus',
        'data' => $data
    ],2000);
}

public function update(Request $request, $id){

    // pengecekan data
    $data = Customer::where('id',$id)->first();
        if(empty($data)){
        return response()->json([
            'pesan' => 'data tidak tersedia',
            'data' => $data
        ], 404);
    }

    // proses validasi
    $validate = Validator::make($request->all(), [
        'name' => 'required',
        'phone' => 'required',
        'email' => 'required',
        'address' => 'required|min:5',
    ]);


    if($validate->fails()){
        return $validate->errors();
    }

    // proses update
    $data->update($request->all());
    return response()->json([
        'pesan' => 'data berhasil diUpdate',
        'data' => $data
    ], 201);
}
}

