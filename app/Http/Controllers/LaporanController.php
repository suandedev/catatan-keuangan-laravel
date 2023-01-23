<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Pemasukan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laporans = Laporan::all();
        return json_encode($laporans);
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
        $data = [
            'tot_masuk' => 5000,
            'tot_keluar' => 2000,
            'selisih' => 3000,
        ];

        Pemasukan::create($data);
        return json_encode($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function show(Laporan $laporan)
    {
        return $laporan->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function edit(Laporan $laporan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laporan $laporan)
    {
        $data = [
            'tot_masuk' => 5000,
            'tot_keluar' => 2000,
            'selisih' => 3000,
        ];
        $laporan->update($data);
        return $laporan->toJson();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illumin ate\Http\Response
     */
    public function destroy(Laporan $laporan)
    {
        $laporan->delete();
        return "ok";
    }
}
