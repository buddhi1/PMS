<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Prescription;
use App\Patient;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prescriptions = DB::table('prescriptions')
                            ->join('patients', 'patient_id', '=', 'patients.id')
                            ->select('prescriptions.id', 'nic', 'name', 'medication', 'comments', 'prescriptions.created_at')
                            ->where('doc_id', '=', 2)
                            ->orderBy('prescriptions.created_at', 'desc')
                            ->paginate(5);    

        return view('prescription.view')
            ->with('prescriptions', $prescriptions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patients = DB::table('patients')->select('id', 'nic')->where('status', '=', 1)->get();
        $medicines = DB::table('medicines')->select('id', 'name', 'brand_name')->where('approval', '=', 1)->get();
        return view('prescription.create')
                ->with('patients', $patients)
                ->with('medicines', $medicines);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Prescription::$rules);

        if($validator->passes()){
            $patient = Patient::find($request->patient_id);
            if($patient){
                $prescription = new Prescription;

                $prescription->doc_id = 2;
                $prescription->patient_id = $request->patient_id;
                $prescription->medication = $request->medication;
                $prescription->process_status = 1;
                $prescription->comments = $request->comments;

                $prescription->save();

                // $medications  = explode('#', $prescription->medication);
                // foreach ($medications as $medi ) {
                //     $med_id = explode(";", $medi)[0];
                // }

                // $pharmacy = DB::table('pharmacy_stores')
                //                 ->join('phramacies', 'pha_id', '=', 'pharmacy_stores.id')
                //                 ->where('phramacies.city', '=', '')
                //                 // ->where('qty', '>', '')
                //                 ->get();

                // $pharmacy = DB::table('pharmacies')
                //                 ->select('name', 'location')
                //                 ->where('city', )
                //                 ->get();

                return view('prescription.location')
                        ->with('prescription', $prescription);
            }
            return redirect('doctor/prescription/create')
                    ->with('message', 'Patient does not exists. Please try again');
        }
        return redirect('doctor/prescription/create')
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
