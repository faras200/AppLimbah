<?php

namespace App\Http\Controllers;

use App\Models\Penjemputan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use    PDF;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('dashboard.laporan.index', [
            'transaksi' => Transaksi::where('status', 'selesai')
            ->whereDate("created_at", '>=', $request->dari)
            ->whereDate("created_at", '<=', $request->sampai)->get(),
            'penjemputan' => Penjemputan::where('status', 'selesai')
            ->whereDate("created_at", '>=', $request->dari)
            ->whereDate("created_at", '<=', $request->sampai)->get(),
        ]);
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
        //
    }

    public function cetak(Request $request)
    {
        if($request->type == 'transaksi'){
          $data =  [
                'transaksi' => Transaksi::where('status', 'selesai')
                ->whereDate("created_at", '>=', $request->dari)
                ->whereDate("created_at", '<=', $request->sampai)->get(),
            ];
        }elseif($request->type == 'penjemputan'){
            $data =  [
                'penjemputan' => Penjemputan::where('status', 'selesai')
                ->whereDate("created_at", '>=', $request->dari)
                ->whereDate("created_at", '<=', $request->sampai)->get(),
            ];
        }


        $pdf = PDF::loadView('dashboard.laporan.cetakpdf', $data);
        return $pdf->stream('laporan.pdf');
        // return $pdf->download('laporan.pdf');
    }
}
