<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use App\Models\Penjemputan;
use App\Models\Post;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
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
            $datas = Transaksi::whereDate('transaksi.created_at', '=', date('Y-m-d'))
                ->get();
            $user = User::where('role_id', 2)->count();
            $transaksi = Transaksi::all()->count();
            $postingan = Post::where('status', 'Aktif')->count();
            $penjemputan = Penjemputan::all()->count();
            return view('dashboard.index', compact('datas', 'user', 'transaksi', 'postingan', 'penjemputan'));
        } elseif ($user->role_id == 2) {
            $datas = Transaksi::select('transaksi.*')->join('post', 'transaksi.post_id', 'post.id')
                ->where('post.user_id', $user->id)
                ->whereDate('transaksi.created_at', '=', date('Y-m-d'))
                ->get();
            $alamat = Alamat::where('user_id', $user->id)->count();
            return view('dashboard.index', compact('datas', 'alamat'));
        } else {
            return view('dashboard.index', [
                'transaksi' => Transaksi::where('type', 'di-rumah')
                    ->where('status', 'Proses')
                    ->whereDate('transaksi.created_at', '=', date('Y-m-d'))
                    ->get(),
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
}
