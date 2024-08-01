<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Specialization;
use Illuminate\Http\Request;

class DoctorController extends Controller
{

    public function index()
    {
        $doctors = Doctor::all();
        $specializations = Specialization::all();
        return view('doctor', ['doctors' => $doctors, 'specializations' => $specializations]);
    }

    public function add(Request $request)
    {
        Doctor::create(
            [
                'name' => $request->name,
                'phone' => $request->phone,
                'specialization_id' => $request->specialization_id
            ]
        );
        return view('home');
    }

    public function edit($id, Request $request)
    {
        Doctor::find($id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'specialization_id' => $request->specialization_id
        ]);
        return view('home');

    }

    public function delete($id)
    {
        Doctor::find($id)->delete();
        return view('home');
    }
}
