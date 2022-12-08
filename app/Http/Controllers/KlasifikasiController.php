<?php

namespace App\Http\Controllers;

use App\Models\Klasifikasi;
use Illuminate\Http\Request;

class KlasifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request -> has('search')){
            $dtKlasifikasi= Klasifikasi::where('klasifikasi_perkara','LIKE','%' .$request->search.'%')->simplePaginate(6);
        }
        else{
            $dtKlasifikasi = Klasifikasi::simplePaginate(6);
        }

        return view('klasifikasi', compact('dtKlasifikasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dtKlasifikasi = Klasifikasi::findorfail($id);
        $dtKlasifikasi->delete();
        return back();
    }

    public function force($id = null){
        if($id != null){
            $dtKlasifikasi = Klasifikasi::onlyTrashed()
            ->where('id', $id)
            ->forceDelete();
        } else{
            $dtKlasifikasi = Klasifikasi::onlyTrashed()->forceDelete();
        }
        return redirect('/klasifikasi');
    }

    public function deletedlist(){
        $dtKlasifikasi = Klasifikasi::onlyTrashed()->get();
        return view('admin.deleted', compact('dtKlasifikasi'));
    }

    public function restore($id = null){

        if($id != null){
            $dtKlasifikasi = Klasifikasi::onlyTrashed()
            ->where('id', $id)
            ->restore();
        } else{
            $dtKlasifikasi = Klasifikasi::onlyTrashed()->restore();
        }
        return redirect('/klasifikasi');
    }
}
