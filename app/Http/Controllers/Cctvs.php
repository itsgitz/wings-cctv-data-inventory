<?php

namespace App\Http\Controllers;

use App\Models\Cctv;
use Illuminate\Http\Request;

class Cctvs extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cctvs = Cctv::all();

        return view('cctvs.index', [
            'cctvs' => $cctvs
        ]);
    }

    public function searchShowData(Request $request)
    {
        $request->validate(
            [
                'ip'    => ['required', 'ipv4']
            ],
            [
                'ip.required'   => 'IP address untuk CCTV tidak boleh kosong',
                'ip.ipv4'       => 'IP address harus berformat IPv4'
            ]
        );

        $cctv = Cctv::where('ip_cctv', '=', $request->ip)->first();

        return view('cctvs.search', [
            'cctv'              => $cctv,
            'requested_cctv'    => $request->ip
        ]);
    }

    public function searchOnlyPage()
    {
        return view('cctvs.search', [
            'welcome' => 'Silahkan cari data CCTV berdasarkan IP CCTV'
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
}
