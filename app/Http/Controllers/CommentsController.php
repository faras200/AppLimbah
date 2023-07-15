<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'post_id' => 'required',
            'komentar' => 'required|max:5000',
            'penawaran' => 'required',
        ]);

        $user = Auth::user();

        // if ($request->file('image')) {
        //     $validasi['image'] = $request->file('image')->store('post-images');
        // }

        if ($request->penawaran != 'kosong') {
            //Menghapus tanda mata uang dan pemisah ribuan
            $numeric_amount = str_replace(['Rp. ', '.'], '', $request->penawaran);

            // Menghapus pemisah ribuan berulang
            $numeric_amount = str_replace('.', '', $numeric_amount);

            // Mengonversi menjadi angka
            $numeric_amount = (int) $numeric_amount;
            $validasi['penawaran'] = $numeric_amount;
        }
        $validasi['user_id'] = auth()->user()->id;

        Comments::create($validasi);

        return redirect("/post/$request->post_id")->with('success', 'Berhasil Menambah Komentar!!');
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
