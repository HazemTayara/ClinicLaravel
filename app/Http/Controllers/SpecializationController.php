<?php

namespace App\Http\Controllers;

use App\Models\Specialization;
use Illuminate\Http\Request;

class SpecializationController extends Controller
{

    public function index()
    {
        $specializations = Specialization::all();
        return view('specialization', ['specializations' => $specializations]);
    }

    public function add(Request $request)
    {
        Specialization::create(
            [
                'name' => $request->name
            ]
        );
        return view('home');
    }

    public function edit($id, Request $request)
    {
        Specialization::find($id)->update([
            'name' => $request->name
        ]);
        return view('home');

    }

    public function delete($id)
    {
        Specialization::find($id)->delete();
        return view('home');

    }
}
