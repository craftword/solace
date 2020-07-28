<?php

namespace App\Http\Controllers\Admin;

use App\Talent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

class ManpowersController extends Controller
{
    public function index()

    {    
        $manrecords = Talent::all();

        return view('admin.manpower.index');
    }


    public function update(Request $request, $id)
    {
       //
        return redirect()->route('admin.humanresource.index');

    }
}
