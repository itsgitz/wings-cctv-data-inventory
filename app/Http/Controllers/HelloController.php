<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HelloController extends Controller
{
    public function index()
    {
        //dd(Storage::url('external/1-200_html_45cee9e1762ddbf9.png'));
        //dd(storage_path('public/external'));
        return view('testing.index', []);
    }
}
