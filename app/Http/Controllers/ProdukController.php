<?php

namespace App\Http\Controllers;

// Memnaggil Model
use App\Produk;
use\Illuminate\Http\Request;

class ProdukController extends Controller
{
    // memasang middleware pada contructor 
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $produk = Produk::all();
        return response()->json($produk);
    } 

    public function show($id){
        $produk = Produk::find($id);
        return response()->json($produk);
    }
    public function post(Request $request){
        $this->validate($request, [
            'nama' => 'required|string',
            'harga' => 'required|integer',
            'warna' => 'required|string',
            'kondisi' => 'required|in:baru,lama',
            'deskripsi' => 'string',
        ]);

        $data = $request->all();
        $produk = Produk::create($data);
        return response()->json($produk);
    }

    public function update(Request $request, $id){
    // mengecek apakah id yang diinputkan terdapat di dalam database 
    // jika tidak maka akan muncul pesan eror
        if(!$produk){
            return response()->json(['message'=>'Produk nit found'], 404);
        }

        // Validasi
        $this->validate($request, [
            'nama' => 'required|string',
            'harga' => 'required|integer',
            'warna' => 'required|string',
            'kondisi' => 'required|in:baru,lama',
            'deskripsi' => 'string',
        ]);

        $produk = Produk::find($id);
        $data = $request->all();
        $produk->fill($data);
        $produk->save();
        return response()->json($produk);
    }

    public function destroy($id){
    // mengecek apakah id yang diinputkan terdapat di dalam database 
    // jika tidak maka akan muncul pesan eror
    if(!$produk){
        return response()->json(['message'=>'Produk nit found'], 404);
    }

        $produk = Produk::find($id);
        return response()->json(['message'=>'Produk deleted !!!']);
    }
}
