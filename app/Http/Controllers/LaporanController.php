<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Foreach_;

class LaporanController extends Controller
{

    public function __construct(){
        $pemasukan = Pemasukan::whereDate('created_at', '2023-01-24')->sum('jumlah');
        $this->setPemasukan($pemasukan);
        $pengeluaran = Pengeluaran::whereDate('created_at', '2023-01-23')->sum('jumlah');
        $this->setPengeluaran($pengeluaran);
        $this->setSelisih($pemasukan - $pengeluaran);
    }

    private $pemasukan, $pengeluaran, $selisih;

    private function setPemasukan($pemasukan){
        $this->pemasukan = $pemasukan;
    }

    private function setPengeluaran($pengeluaran){
        $this->pengeluaran = $pengeluaran;
    }

    private function setSelisih($selisih){
        $this->selisih = $selisih;
    }

    private function getPemasukan(){
        return $this->pemasukan;
    }

    private function getPengeluaran(){
        return $this->pengeluaran;
    }

    private function getSelisih(){
        return $this->selisih;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return json_encode($this->getSelisih());
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

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return $this->getSelisih();
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
