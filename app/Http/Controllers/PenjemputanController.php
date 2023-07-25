<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Penjemputan;
use App\Models\Post;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenjemputanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.penjemputan.index', [
            'transaksi' => Transaksi::with(['post', 'user'])->where('type', 'di-rumah')
                ->where('status', 'Proses')
                ->get(),
            'datas' => Penjemputan::with(['transaksi', 'user'])->where('status', 'jalan')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.penjemputan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $petugas = Auth::user();
        $transaksi = Transaksi::firstwhere('id', $request->trxid);
        $alamat = $transaksi->user->alamat;

        $penjemputan = Penjemputan::create([
            'transaksi_id' => $transaksi->id,
            'user_id' => $transaksi->user_id,
            'alamat_id' => $alamat->id,
            'petugas_id' => $petugas->id,
            'status' => 'jalan',
        ]);

        $transaksi->update([
            'status' => 'Penjemputan',
        ]);

        return response()->json([
            'success' => true,
            'penjemputan' => $penjemputan->id,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $penjemputan = Penjemputan::firstwhere('id', $id);
        $transaksi = Transaksi::firstwhere('id', $penjemputan->transaksi_id);
        return view('dashboard.penjemputan.show', [
            'transaksi' => $transaksi,
            'data' => Post::firstwhere('id', $transaksi->post_id),
            'penjemputan' => Penjemputan::firstwhere('id', $id),
            'komentars' => Comments::where('post_id', $transaksi->post_id)->get(),
        ]);
    }

    public function selesai(Request $request)
    {

        $penjemputan = Penjemputan::where('id', $request->penjemputan)->first();
        $jemputupdate = Penjemputan::where('id', $penjemputan->id)
            ->update([
                'foto' => $request->foto,
                'deskripsi' => $request->deskripsi,
                'status' => 'Selesai',
            ]);
        $trx = Transaksi::where('id', $penjemputan->transaksi_id)->update(['status' => 'Selesai']);
        return response()->json([
            'success' => true,
            'transaksi' => $trx,
            'penjemputan' => $jemputupdate,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard.penjemputan.edit', [
            'datas' => Penjemputan::firstwhere('id', $id),
        ]);
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
        Penjemputan::destroy($id);
        return redirect('/penjemputan')->with('success', 'Berhasil Menghapus Penjemputan!!');
    }
}
