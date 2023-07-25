<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comments;
use App\Models\Penjemputan;
use App\Models\Post;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->role_id == 0) {
            $datas = Transaksi::with(['post', 'user'])->where('status', '!=', 'selesai')->get();
        } elseif ($user->role_id == 2) {
            $datas = Transaksi::with(['post', 'user'])->select('transaksi.*')->join('post', 'transaksi.post_id', 'post.id')
                ->where('post.user_id', $user->id)
                ->get();
        }

        return view('dashboard.transaksi.index', compact('datas'));

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
        $validasi = $request->validate([
            'post_id' => 'required|max:255',
            'harga_deal' => 'required',
            'type' => 'required',
        ]);

        $user = Auth::user();
        $validasi['status'] = 'Proses';
        $validasi['deskripsi'] = $request->deskripsi;
        $validasi['user_id'] = $user->id;

        Post::where('id', $validasi['post_id'])->update([
            'status' => 'Non-Aktif',
        ]);
        $transaksi = Transaksi::create($validasi);
        return response()->json([
            'success' => true,
            'transaksi' => $transaksi,
        ]);
        //return redirect('/post')->with('success', 'Berhasil Menambah Post!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi = Transaksi::firstwhere('id', $id);
        return view('dashboard.transaksi.show', [
            'transaksi' => $transaksi,
            'data' => Post::firstwhere('id', $transaksi->post_id),
            'komentars' => Comments::where('post_id', $transaksi->post_id)->get(),
            'penjemputan' => Penjemputan::firstwhere('transaksi_id', $transaksi->id),
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

    public function selesai(Request $request)
    {
        $trx = Transaksi::where('id', $request->trxid)->update(['status' => 'Selesai']);

        return response()->json([
            'success' => true,
            'transaksi' => $trx,
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Transaksi::destroy($id);

        return redirect('/transaksi')->with('success', 'Berhasil Menghapus Transaksi!!');
    }
}
