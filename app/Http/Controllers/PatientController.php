<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Patient;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('patient.index')
                ->with('patients', Patient::paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patient.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Patient::$rules);

        if($validator->passes()){
            $patient = new Patient;

            $patient_ex = Patient::where('nic', $request->nic)->first();
            if(!$patient_ex){
                $patient->name = $request->name;
                $patient->nic = $request->nic;
                $patient->address = $request->address;
                $patient->city = $request->city;
                $patient->location = $request->location;
                $patient->phone = $request->phone;
                $patient->status = 0;

                $patient->save();

                return redirect('admin/patient/create')
                        ->with('message', 'New patient added sucessfully');
            }
            return redirect('admin/patient/create')
                    ->with('message', 'Patient already exists in the system');
        }
        return redirect('admin/patient/create')
                ->with('message', 'Following errors occured')
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
        $patient = Patient::find($id);

        if($patient){
            return view('patient.edit')
                    ->with('patient', $patient);
        }
        return redirect('admin/patient')
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
        $validator = Validator::make($request->all(), Patient::$rules);

        if($validator->passes()){

            $patient = Patient::find($id);
            if($patient){
                $patient->name = $request->name;
                $patient->address = $request->address;
                $patient->city = $request->city;
                $patient->location = $request->location;
                $patient->phone = $request->phone;
                $patient->status = $request->status;

                $patient->save();

                return redirect('admin/patient')
                        ->with('message', 'Patient updated sucessfully');
            }
            return redirect('admin/patient')
                    ->with('message', 'Patient not found in the system. Please try again');
        }
        return redirect('admin/patient')
                ->with('message', 'Following errors occured')
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
        $patient = Patient::find($id);

        if ($patient) {
            $patient->delete();

            return redirect('admin/patient')
                    ->with('message', 'Patient account deleted successfully');
        }

        return redirect('admin/patient')
                ->with('message', 'Something went wrong. Please try again');
    }
}
