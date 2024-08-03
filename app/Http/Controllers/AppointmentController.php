<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments= Appointment::all();
        $doctors= Doctor::all();
        $patients= Patient::all();
        return view("appointment",["appointments"=>$appointments,"doctors"=>$doctors,"patients"=>$patients]);
    }
    public function addappointment(REQUEST $request)
    {
        $validate= 
        Validator::make($request->all(),
           [
             "date"=>"required|date",
            "patient_id"=>"required|string|exists:patients,id",
            "doctor_id"=>"required|string|exists:doctors,id",
        ]);
        if ($validate->fails())
        {
            return $this->requiredField($validate->errors());
        }
        else{
            $appointments=Appointment::create(
                $validate->validated());
        }
        
        // Appointment::create([
        //     "date"=>$request->date,
        //     "patient_id"=>$request->patient_id,
        //     "doctor_id"=>$request->doctor_id
        // ]);
        return view('home');

    }
    public function editappointment(REQUEST $request,$id)
    {
        Appointment::find($id)->update([
            "date"=>$request->date,
            "patient_id"=>$request->patient_id,
            "doctor_id"=>$request->doctor_id
        ]);
        return view('home');
    }

    public function deleteappointment($id)
    {
        Appointment::find($id)->delete();
        return view('home');
    }


}
