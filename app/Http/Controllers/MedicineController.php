<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Medicine;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //load all available medicines
        return view('medicine.index')                
            ->with('medicines', Medicine::paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //get add medicine view
        return view('medicine.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //add new medicine to DB

        $medicine = new Medicine();
        //checking whether a medicine already exists

        $brand_name = DB::table('medicines')->where('brand_name', Input::get('brand_name'))->first();

        if(!$brand_name) {
            $medicine->name = Input::get('name');
            $medicine->brand_name = Input::get('brand_name');
            $medicine->approval = 0;
            $medicine->prescribed = 1;
            $medicine->description = Input::get('description');

            $medicine->save();

            return redirect('admin/medicine')
                    ->with('message', 'New medicine added successfully');
        }

        return redirect('admin/medicine/create')
                    ->with('message', 'Something went wrong');
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
        //load edit medicine form
        $medicine = Medicine::find($id);

        if ($medicine) {
            return view('medicine.edit')
                    ->with('medicine', $medicine);
        }

        return redirect('medicine/admin')
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
        //delete medicine
        $medicine = Medicine::find($id);

        if ($medicine) {
            $medicine->delete();

            return redirect('admin/medicine')
                    ->with('message', 'Medicine Removed Successfull');
        }

        return redirect('admin/medicine')
                ->with('message', 'Something went wrong');
       var_dump("sadsadasd".$id) ;
    }
}
