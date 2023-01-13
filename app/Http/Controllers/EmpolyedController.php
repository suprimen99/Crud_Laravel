<?php

namespace App\Http\Controllers;

use App\Models\Empolyed;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\App;



class EmpolyedController extends Controller
{
    public function index(Request $request )
    {
        if($request->has('search')){
        $data = Empolyed::where('nama','LIKE','%'.$request->search.'%')->paginate(5);
        }else{
        $data = Empolyed::paginate(5);
        }

        return view('datakaryawan',compact('data'));
    }

    public function tambahpegawai(){
        return view('tambahdata');
    }

    public function insertdata(Request $request){
        $data = Empolyed::create($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotopegawai/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();

        }
        return redirect()->route('pegawai')->with('success','Data Berhasil ditambahkan');
    }

    public function tampilkandata($id){
        $data = Empolyed::find($id);
        return view('tampilkandata', compact('data'));
    }

    public function updatedata(Request $request,$id){
        $data = Empolyed::find($id);
        $data->update($request->all());
        return redirect()->route('pegawai')->with('success','Data Berhasil diUpdate');
    }

    public function deletedata($id){
        $data = Empolyed::find($id);
        $data->delete();
        return redirect()->route('pegawai')->with('success','Data Berhasil Dihapus');
    }

    public function exportpdf(){
        // $data = Empolyed::all();
        // view()->share('data',$data);
        // $pdf = App::make('dompdf.wrapper');
        // $pdf->loadView('Data-Pegawai')->setPaper('a4','landscape');
        // return $pdf->download('data.pdf');

         $data = Empolyed::all();
        view()->share('data', $data);
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadview('Data-Pegawai')->setPaper('a4', 'landscape');
        return $pdf->download('Data-pegawai.pdf');
    }
}