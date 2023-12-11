<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    //menampilkan data dinphpmyadmin/database ke halaman obat(index utama)
    public function obat(){
        $obat = Obat::all();
        return view('dataobat.obat',compact(['obat']));
        // return view('dataobat.obat', [
        //     "obat" => $obat
        // ]);
    }
    public function print(){
        $obat = Obat::all();
        return view('dataobat.cetak',compact(['obat']));
        // return view('dataobat.obat', [
        //     "obat" => $obat
        // ]);
    }

    //meanmpilkan riwayat arsip data
    public function arc(){
        $obat = Obat::all();
        return view('dataobat.riwayat',compact(['obat']));
    }


    //membat
    public function create(){
        return view('dataobat.create');
    }

    public function store(Request $request){
        // dd($request->except(['_token','submit']));
        Obat::create($request->except(['_token','submit']));
        return redirect('/obat');
    }

    public function edit($id){
        $obat = Obat::find($id);
        return view('dataobat.edit',compact(['obat']));

    }

    public function update($id,Request $request){
        $obat = Obat::find($id);
        $obat->update($request->except(['_token','submit']));
        return redirect('/obat');
    }

    public function destroy($id){
        $obat = Obat::find($id);
        $obat->delete();
        return redirect('/obat');
    }
}
