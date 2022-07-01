<?php

namespace App\Http\Controllers;

use App\Models\Cctv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CctvsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $group = $request->input('group');


        // redirect to default cctv data SMU1
        if ( empty($group) ) {
            return redirect('/?group=SMU1');
        }

        $cctvs = Cctv::where('group', $group)->paginate(25);
        $cctvs->appends(['group' => $group]);

        return view('cctvs.index', [
            'cctvs' => $cctvs
        ]);
    }

    public function searchShowData(Request $request)
    {
        $cctvs = Cctv::where('ip_cctv', 'like', "%{$request->search}%")
            ->orWhere('location', 'like', "%{$request->search}%")
            ->orWhere('zone', 'like', "%{$request->search}%")
            ->get();

        return view('cctvs.search', [
            'cctvs'              => $cctvs,
            'requested_cctv'    => $request->ip
        ]);
    }

    public function searchOnlyPage()
    {
        return view('cctvs.search', [
            'welcome' => 'Silahkan cari data CCTV berdasarkan IP CCTV',
            'requested_cctv' => null
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
        return view('cctvs.create', []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate(
            [
                'ip_nvr'        => ['required', 'ipv4'],
                'ip_cctv'       => ['required', 'ipv4'],
            ],
            [
                'ip_nvr.required'   => 'IP Address untuk NVR tidak boleh kosong',
                'ip_nvr.ipv4'       => 'IP Address untuk NVR harus berformat IPv4',
                'ip_cctv.required'  => 'IP Address untuk CCTV tidak boleh kosong',
                'ip_cctv.ipv4'      => 'IP Address untuk CCTV harus berformat IPv4'
            ]
        );


       $cctv = new Cctv;
       $cctv->cctv_type     = $request->cctv_type;
       $cctv->ip_nvr        = $request->ip_nvr;
       $cctv->ip_cctv       = $request->ip_cctv;
       $cctv->ch            = $request->ch;
       $cctv->status        = $request->status;
       $cctv->area          = $request->area;
       $cctv->zone          = $request->zone;
       $cctv->cctv_number   = $request->cctv_number;
       $cctv->category_area     = $request->category_area;
       $cctv->location          = $request->location;
       $cctv->old_cctv          = $request->old_cctv;
       $cctv->new_cctv          = $request->new_cctv;
       $cctv->name_change       = $request->name_change;
       $cctv->data_status       = $request->data_status;
       $cctv->description       = $request->description;
       $cctv->group             = $request->group;


       if ( !empty( $request->file('image') ) ) {
           $image = $request->file('image')->store('public/img/cctvs');
           $cctv->image = Storage::url($image);
       }

       $cctv->save();

       return redirect()
           ->route('cctvs.show', ['cctv' => $cctv->id])
           ->with('message_success', 'Berhasil menambah CCTV');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cctv = Cctv::where('id', '=', $id)->first();

        if ( !isset($cctv) ) {
            abort(404);
        }

        return view('cctvs.show', [
            'cctv' => $cctv
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
        $cctv = Cctv::find($id);

        if ( !isset($cctv) ) {
            abort(404);
        }

        return view('cctvs.edit', [
            'cctv' => $cctv
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
        $request->validate(
            [
                'ip_nvr'        => ['required', 'ipv4'],
                'ip_cctv'       => ['required', 'ipv4'],
            ],
            [
                'ip_nvr.required'   => 'IP Address untuk NVR tidak boleh kosong',
                'ip_nvr.ipv4'       => 'IP Address untuk NVR harus berformat IPv4',
                'ip_cctv.required'  => 'IP Address untuk CCTV tidak boleh kosong',
                'ip_cctv.ipv4'      => 'IP Address untuk CCTV harus berformat IPv4'
            ]
        );

        $cctv = Cctv::find($id);
        $cctv->data_number  = $request->data_number;
        $cctv->cctv_type    = $request->cctv_type;
        $cctv->ip_nvr       = $request->ip_nvr;
        $cctv->ip_cctv      = $request->ip_cctv;
        $cctv->ch           = $request->ch;
        $cctv->status       = $request->status;
        $cctv->area         = $request->area;
        $cctv->zone         = $request->zone;
        $cctv->cctv_number  = $request->cctv_number;
        $cctv->category_area    = $request->category_area;
        $cctv->location         = $request->location;
        $cctv->old_cctv         = $request->old_cctv;
        $cctv->new_cctv         = $request->new_cctv;
        $cctv->name_change      = $request->name_change;
        $cctv->data_status      = $request->data_status;
        $cctv->description      = $request->description;
        $cctv->group            = $request->group;

        if ( !empty( $request->file('image') ) ) {
            if ( isset($cctv->image) ) {
                $filePath = 'public' . str_replace('/storage', '', $cctv->image);
                Storage::delete($filePath);
            }

            $image = $request->file('image')->store('public/img/cctvs');
            $cctv->image = Storage::url($image);
        }

        $cctv->save();

        return redirect()
            ->route('cctvs.show', ['cctv' => $id])
            ->with('message_success', 'Berhasil mengubah data CCTV '. $request->ip_cctv);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cctv = Cctv::find($id);

        $cctv->delete();

        $filePath = 'public' . str_replace('/storage', '', $cctv->image);
        Storage::delete($filePath);

        return redirect()
            ->route('cctv.dashboard.get')
            ->with('message_success', 'Berhasil menghapus CCTV');
    }
}
