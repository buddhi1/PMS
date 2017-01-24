<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Doctor;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('doctor.index')
                ->with('doctors', Doctor::paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Doctor::$rules);

        if($validator->passes()){

            $doctor = new Doctor;

            $doctor_name = Doctor::where('reg_no', $request->reg_no)->first();

            if(!$doctor_name){
                $doctor->name = $request->name;                
                $doctor->reg_no = $request->reg_no;                
                $doctor->address = $request->address;                
                $doctor->city = $request->city;                
                $doctor->location = $request->location;  
                $doctor->status = 0;   

                $doctor->save();

                return redirect('admin/doctor/create')
                        ->with('message', 'New doctor added successfully');              
            }

            return redirect('admin/doctor/create')
                    ->with('message', 'Doctor has been already registered in the system');

        }

        return redirect('admin/doctor/create')
                ->with('message', 'Following Errors')
                ->withErrors($validator);
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
        //load edit doctor form
        $doctor = Doctor::find($id);

        if ($doctor) {
            return view('doctor.edit')
                    ->with('doctor', $doctor);
        }

        return redirect('admin/doctor')
                ->with('message', 'Something went wrong');
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
        $validator = Validator::make($request->all(), Doctor::$rules);

        if($validator->passes()){

            $doctor = Doctor::find($id);

            if($doctor){
                $doctor->name = $request->name;                    
                $doctor->address = $request->address;                
                $doctor->city = $request->city;                
                $doctor->location = $request->location;  
                $doctor->status = $request->status;   

                $doctor->save();

                return redirect('admin/doctor')
                        ->with('message', 'Doctor updated successfully');              
            }

            return redirect('admin/doctor')
                    ->with('message', 'Doctor cannot be found. Please try again');

        }

        return redirect('admin/doctor')
                ->with('message', 'Following Errors')
                ->withErrors($validator);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = Doctor::find($id);

        if ($doctor) {
            $doctor->delete();

            return redirect('admin/doctor')
                    ->with('message', 'Doctor account deleted successfully');
        }

        return redirect('admin/doctor')
                ->with('message', 'Something went wrong. Please try again');
    }
}
