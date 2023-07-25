<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Alamat;
use App\Models\Comments;
use App\Models\Penjemputan;
use App\Models\Post;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostinganController extends Controller
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
            return view('dashboard.postingan.index', [
                'postingan' => Post::where('status', 'Aktif')->get(),
            ]);
        } elseif ($user->role_id == 2) {
            return view('dashboard.postingan.index', [
                'postingan' => Post::where('user_id', $user->id)->get(),
            ]);

        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.postingan.create');
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
            'nama_barang' => 'required|max:255',
            'foto' => 'required|max:5000',
            'harga' => 'required|max:5000',
            'deskripsi_barang' => 'required',
            'jenis' => 'required',
            'berat' => 'required',
        ]);

        $user = Auth::user();

        // if ($request->file('image')) {
        //     $validasi['image'] = $request->file('image')->store('post-images');
        // }

        // Menghapus tanda mata uang dan pemisah ribuan
        $numeric_amount = str_replace(['Rp. ', '.'], '', $validasi['harga']);

        // Menghapus pemisah ribuan berulang
        $numeric_amount = str_replace('.', '', $numeric_amount);

        // Mengonversi menjadi angka
        $numeric_amount = (int) $numeric_amount;
        $validasi['status'] = 'Aktif';
        $validasi['harga'] = $numeric_amount;
        $validasi['user_id'] = $user->id;

        Post::create($validasi);

        return redirect('/post')->with('success', 'Berhasil Menambah Post!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        return view('dashboard.postingan.show', [
            'data' => Post::firstwhere('id', $id),
            'komentars' => Comments::where('post_id', $id)->get(),
            'alamat' => Alamat::firstwhere('user_id', $user->id),
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
        return view('dashboard.postingan.edit', [
            'post' => Post::firstwhere('id', $id),
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
        $validasi = $request->validate([
            'nama_barang' => 'required|max:255',
            'foto' => 'required|max:5000',
            'harga' => 'required|max:5000',
            'deskripsi_barang' => 'required',
            'jenis' => 'required',
            'status' => 'required',
            'berat' => 'required',
        ]);
        // dd($validasi);

        $user = Auth::user();

        // if ($request->file('image')) {
        //     $validasi['image'] = $request->file('image')->store('post-images');
        // }

        // Menghapus tanda mata uang dan pemisah ribuan
        $numeric_amount = str_replace(['Rp. ', '.'], '', $validasi['harga']);

        // Menghapus pemisah ribuan berulang
        $numeric_amount = str_replace('.', '', $numeric_amount);

        // Mengonversi menjadi angka
        $numeric_amount = (int) $numeric_amount;
        $validasi['harga'] = $numeric_amount;
        $validasi['user_id'] = $user->id;

        Post::where('id', $id)
            ->update($validasi);

        return redirect('/post')->with('success', 'Berhasil Mengubah Post!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);
        Transaksi::where('post_id', $id)->delete();
        Penjemputan::where('post_id', $id)->delete();
        Comments::where('post_id', $id)->delete();
        return redirect('/post')->with('success', 'Berhasil Menghapus Admin!!');
    }
}
