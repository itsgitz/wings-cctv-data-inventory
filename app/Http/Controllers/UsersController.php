<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('user.role')->except('edit', 'update');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('users.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('users.create', []);
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
                'userid'    => ['required', 'min:4', 'max:12', 'unique:App\Models\User,userid'],
                'name'      => ['required', 'min:6'],
                'email'     => ['required', 'email:rfc,dns', 'unique:App\Models\User,email'],
                'role'      => ['required'],
                'password'  => ['required', 'min:6'],
            ],
            [
                'userid.required'   => 'Username tidak boleh kosong',
                'userid.min'        => 'Username minimal harus memiliki 4 karakter',
                'userid.max'        => 'Username tidak boleh lebih dari 12 karakter',
                'userid.unique'     => 'Username telah terdaftar',
                'name.required'     => 'Nama tidak boleh kosong',
                'name.min'          => 'Nama minimal harus memiliki 6 karakter',
                'email.required'    => 'Email tidak boleh kosong',
                'email.email'       => 'Format email salah',
                'email.unique'      => 'Email telah terdaftar',
                'role.required'     => 'Role tidak boleh kosong',
                'password.required'     => 'Password tidak boleh kosong',
                'password.min'          => 'Password minimal harus memiliki 6 karakter'
            ]
        );

        $password = '';
        if ($request->password == $request->confirm_password) {
            $password = Hash::make($request->password);
        } else {
            return redirect()
                ->route('users.create')
                ->with('message_error', 'Password confimation tidak sama');
        }

        $user = new User;
        $user->userid   = $request->userid;
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->role     = $request->role;
        $user->password  = $password;
        $user->description = $request->description;

        $user->save();

        return redirect()
            ->route('users.index')
            ->with('message_success', 'Berhasil menambah user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::id() != 1) {
            if (Auth::id() != $id) {
                return redirect()
                    ->route('users.edit', ['user' => Auth::id()]);
            }
        }

        $user = User::findOrFail($id);

        return view('users.edit', [
            'user' => $user
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
        if ( isset($request->userid) ) {
            $request->validate(
                [
                    'userid' => ['required', 'min:4', 'max:12']
                ],
                [
                    'userid.required'   => 'Username tidak boleh kosong',
                    'userid.min'        => 'Username minimal harus memiliki 4 karakter',
                    'userid.max'        => 'Username tidak boleh lebih dari 12 karakter'
                ]
            );
        }

        $request->validate(
            [
                'name'      => ['required', 'min:6'],
                'email'     => ['required', 'email:rfc,dns'],
            ],
            [
                'name.required'     => 'Nama tidak boleh kosong',
                'name.min'          => 'Nama minimmal harus memiliki 6 karakter',
                'email.required'    => 'Email tidak boleh kosong',
                'email.email'       => 'Format email salah'
            ]
        );

        $password = '';

        $user = User::find($id);

        if ($request->userid != $user->userid) {
            $request->validate(
                [
                    'userid'        => ['unique:App\Models\User,userid']
                ],
                [
                    'userid.unique'     => 'Username telah terdaftar'
                ]
            );
        }

        if ($request->email != $user->email) {
            $request->validate(
                [
                    'email'         => ['unique:App\Models\User,email']
                ],
                [
                    'email.unique'  => 'Email telah terdaftar'
                ]
            );
        }

        // If user want update their password
        if ( isset($request->password) ) {
            $request->validate(
                [
                    'password' => ['required', 'min:6']
                ],
                [
                    'password.required' => 'Password tidak boleh kosong',
                    'password.min'      => 'Password minimal harus memiliki 6 karakter'
                ]
            );

            if ($request->password == $request->confirm_password) {
                $password = Hash::make($request->password);
                $user->password = $password;
            } else {
                return redirect()
                    ->route('users.edit', ['user' => $id])
                    ->with('message_error', 'Password confimation tidak sama');
            }
        }

        $user->name     = $request->name;
        $user->email    = $request->email;

        // 1 is default user for admin
        if ($id != 1) {
            $user->userid   = $request->userid;
            $user->role     = $request->role;
        }

        $user->description = $request->description;

        $user->save();

        return redirect()
            ->route('users.edit', ['user' => $id])
            ->with('message_success', 'Data user berhasil diubah');
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
        $user = User::find($id);
        $user->delete();


        return redirect()
            ->route('users.index')
            ->with('message_success', 'Berhasil menghapus user');
    }
}
