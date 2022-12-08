<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Perkara;
use App\Models\Hakim;
use App\Models\Klasifikasi;
use App\Models\Ruang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerkaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $dtPerkara = Perkara::with('klasifikasi','hakim','ruang')->simplePaginate(12);
        // return view ('perkara', compact('dtPerkara'));

        $dtPerkara = DB::table('perkara')
                        ->join('klasifikasi', 'klasifikasi.id', '=', 'perkara.klasifikasi_id')
                        ->join('hakim', 'hakim.id', '=', 'perkara.hakim_id')
                        ->join('ruang', 'ruang.id', '=', 'perkara.ruang_id')
                        ->select('perkara.*','klasifikasi.klasifikasi_perkara','hakim.nama_hakim','ruang.nama_ruang')
                        ->get();

        return view('perkara', compact('dtPerkara'));

        // $perkara = DB::select('select * from perkara');

    }

    public function data($id)
    {
        $klasi = DB::select('select * from klasifikasi')[0];
        $hkm = DB::select('select * from hakim')[0];
        $rsd = DB::select('select * from ruang')[0];
        $pkr = DB::select('select * from perkara')[0];

        // $dtPerkara = DB::table('perkara')
        //                 ->join('klasifikasi', 'klasifikasi.id', '=', 'perkara.klasifikasi_id')
        //                 ->join('hakim', 'hakim.id', '=', 'perkara.hakim_id')
        //                 ->join('ruang', 'ruang.id', '=', 'perkara.ruang_id')
        //                 ->select('perkara.no_perkara','perkara.terdakwa','perkara.tgl_sidang','klasifikasi.klasifikasi_perkara','hakim.nama_hakim','ruang.nama_ruang')
        //                 ->get();

            //tampilkan view barang dan kirim datanya ke view tersebut
            return view('admin.show-perkara', compact('pkr','klasi','hkm','rsd'));

        //eloquent
        // $klasi = Klasifikasi::all();
        // $hkm = Hakim::all();
        // $rsd = Ruang::all();
        // $pkr = Perkara::with('klasifikasi','hakim','ruang')->findorfail($id);
        // return view ('admin.show-perkara', compact('pkr','klasi','hkm','rsd'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $klasi = DB::select('select * from klasifikasi')[0];
        $hkm = DB::select('select * from hakim')[0];
        $rsd = DB::select('select * from ruang')[0];
        return view('admin.add-perkara');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::insert('INSERT INTO perkara(no_perkara, terdakwa, hakim_id, tgl_sidang, ruang_id, klasifikasi_id) VALUES (:no_perkara, :terdakwa, :hakim_id, :tgl_sidang, :ruang_id, :klasifikasi_id)',
        [
            'no_perkara' => $request->no_perkara,
            'terdakwa' => $request->terdakwa,
            'hakim_id' => $request->hakim_id,
            'tgl_sidang' => $request->tgl_sidang,
            'ruang_id' => $request->ruang_id,
            'klasifikasi_id' => $request->klasifikasi_id
        ]
        );

        // Perkara::create([

        // ]);

        return redirect('perkara')->with('toast_success', 'Data Berhasil Ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($dtPerkara->id);
        //dd($id);
        // $dtPerkara = DB::select('Select no_perkara,terdakwa FROM perkara WHERE id = :id', [
        //     'id' => $id,
        $dtPerkara = DB::table('perkara')->where('id', $id)->first();
        return view ('admin.edit-perkara', compact('dtPerkara'));
        // dd($dtPerkara);
        // $dtPerkara = DB::table('perkara')->where('id', $id)->first();
        // $dtPerkara = DB::select('select no_perkara, terdakwa from perkara')->where('id', $id)->first();

        // $dtPerkara = DB::table('perkara')
        //                 ->join('klasifikasi', 'klasifikasi.id', '=', 'perkara.klasifikasi_id')
        //                 ->join('hakim', 'hakim.id', '=', 'perkara.hakim_id')
        //                 ->join('ruang', 'ruang.id', '=', 'perkara.ruang_id')
        //                 ->select('perkara.no_perkara','perkara.terdakwa','perkara.tgl_sidang','klasifikasi.klasifikasi_perkara','hakim.nama_hakim','ruang.nama_ruang')
        //                 ->get();

        // $dtPerkara = DB::select('select * from perkara iner join klasifikasi on perkara.klasifikasi_id = klasifikasi.id
        // inner join hakim on hakim.id = perkara.hakim_id inner join ruang on ruang.id = perkara.ruang_id
        // where perkara.id = :id',["id" => $id]);


        // $dtPerkara = DB::table('perkara')
        // ->join('klasifikasi', 'klasifikasi.id', '=', 'perkara.klasifikasi_id')
        // ->join('hakim', 'hakim.id', '=', 'perkara.hakim_id')
        // ->join('ruang', 'ruang.id', '=', 'perkara.ruang_id')
        // ->where('perkara.id','=',$id)
        // ->select('perkara.*','klasifikasi.klasifikasi_perkara','hakim.nama_hakim','ruang.nama_ruang')
        // ->get();


        // return view('admin.edit-perkara', compact('dtPerkara'));

        // $klasi = Klasifikasi::all();
        // $hkm = Hakim::all();
        // $rsd = Ruang::all();
        // $pkr = Perkara::with('klasifikasi','hakim','ruang')->findorfail($id);
        // return view ('admin.edit-perkara')->with('dtPerkara', $dtPerkara);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request )
    {
        DB::update('UPDATE perkara SET no_perkara = :no_perkara, terdakwa = :terdakwa  WHERE id = :id',
        [
            'id' => $id,
            'no_perkara' => $request->no_perkara,
            'terdakwa' => $request->terdakwa,
            // 'hakim_id' => $request->hakim_id,
            // 'tgl_sidang' => $request->tgl_sidang,
            // 'ruang_id' => $request->ruang_id,
            // 'klasifikasi_id' => $request->klasifikasi_id
        ]);

        //with('klasifikasi','hakim','ruang')->
        // $pkr = Perkara::findorfail($id);
        // $pkr->update($request->all());
        return redirect('perkara')->with('toast_success', 'Data Berhasil Disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('DELETE FROM perkara WHERE id = :id', ['id' => $id]);
        // DB::delete('delete perkara where id = ?',[$id]);
        // $pkr = Perkara::findorfail($id);
        // $pkr->delete();
        return back();
    }
}
