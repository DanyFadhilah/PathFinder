<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelamar;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Pelamar $pelamar)
    { 
        $pelamar = Pelamar::findOrFail($pelamar->id);
        return view('profile\profile', ['pelamar'=>$pelamar]);
    }

    public function project(Pelamar $pelamar)
    {
        $pelamar = Pelamar::findOrFail($pelamar->id);
        return view('profile\project', ['pelamar'=>$pelamar]);
    }

    public function background(Pelamar $pelamar)
    {
        $pelamar = Pelamar::findOrFail($pelamar->id);
        return view('profile\backgroundedu', ['pelamar'=>$pelamar]);
    }

    public function pro(Pelamar $pelamar)
    {
        $pelamar = Pelamar::findOrFail($pelamar->id);
        return view('profile\professional', ['pelamar'=>$pelamar]);
    }

    public function basic(Pelamar $pelamar)
    {
        $pelamar = Pelamar::findOrFail($pelamar->id);
        return view('profile\basic', ['pelamar'=>$pelamar]);
    }

    public function advan(Pelamar $pelamar)
    {
        $pelamar = Pelamar::findOrFail($pelamar->id);
        return view('profile\advan', ['pelamar'=>$pelamar]);
    }

    public function home()
    {
        return view('pilihan');
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
