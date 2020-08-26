<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrudController extends Controller
{
    //tampilkan data
    public function index(){
        $data_barang = DB::table('data_barang')->paginate(10);
        return view('crud',['data_barang' => $data_barang]);
    }

    //action method untuk menampilkan tambah data
    public function tambah(){
        return view('tambah-data');
    }

    //method untuk simpan data

    public function simpan(Request $request){
        // dd($request->all());
        // DB::insert('insert into data_barang (kode_barang, nama_barang) values (?, ?)', [$request->kode_barang, $request->nama_barang]);

        $this->_validation($request);

        DB::table('data_barang')->insert([
            ['kode_barang' => $request->kode_barang, 'nama_barang' => $request->nama_barang],
            // ['kode_barang' => $request->kode_barang.'xx', 'nama_barang' => $request->nama_barang.'xx'],
        ]);
        
        return redirect()->route('crud')->with('message','Data berhasil disimpan');
    }

    private function _validation(Request $request){

        $validation = $request->validate([
            'kode_barang' => 'required|max:10|min:3',
            'nama_barang' => 'required|max:100|min:3'
        ],
        [
            'kode_barang.required' => 'Harus diisi',
            'kode_barang.max' => 'Maksimal 10 digit',
            'kode_barang.min' => 'Minimal 3 digit',
            'nama_barang.required' => 'Harus diisi',
            'nama_barang.max' => 'Max 100 digit',
            'nama_barang.min' => 'Minimal 3 digit'
        ]
    
    );

    }

    //method untuk edit data
    public function edit($id){
        $data_barang = DB::table('data_barang')->where('id',$id)->first();
        return view('edit-data',['data_barang' => $data_barang]);
    }

    //method untuk update data
    public function update(Request $request,$id){
        // dd($request->all());

        $this->_validation($request);

        DB::table('data_barang')->where('id',$id)->update([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang
        ]);
        return redirect()->route('crud')->with('message','Data berhasil di update');
    }

    //method untuk hapus data
    public function delete($id){

        DB::table('data_barang')->where('id',$id)->delete();

        return redirect()->back()->with('message','Data berhasil dihapus');
    }
}
