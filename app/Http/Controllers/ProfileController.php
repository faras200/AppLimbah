<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.profile.index', [
            'user' => User::firstwhere('id', auth()->user()->id),
            'alamat' => Alamat::firstwhere('id', auth()->user()->alamat_id),
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
        $user = auth()->user();
        $rules = [
            'name' => 'required|max:255',
        ];
        $email = User::where('id', $id)->first();
        if ($request->email != $email->email) {
            $rules['email'] = 'required|unique:users';
        }
        if (!is_null($request->password)) {
            if (!Hash::check($request->passwordlama, $user->password)) {
                return redirect('/profile')->with('failed', 'Password Lama Tidak Sama!!');
            }
            $rules['password'] = 'required|min:8';
            $validasi = $request->validate($rules);
            $validasi['password'] = Hash::make($validasi['password']);
        } else {
            $validasi = $request->validate($rules);
        }

        User::where('id', $id)
            ->update($validasi);

        return redirect('/profile')->with('success', 'Berhasil Mengubah Profile!!');
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

    public function alamat(Request $request)
    {

    }
}
