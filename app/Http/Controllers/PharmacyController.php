<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Pharmacy;

class PharmacyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pharmacy.index')
        ->with('pharmacies',Pharmacy::paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pharmacy.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //add new pharmacy to DB
        $validator = Validator::make($request->all(), Pharmacy::$rules);
        if($validator->passes()){
            $pharmacy = new Pharmacy();
            $register_number = DB::table('pharmacies')->where('register_number', Input::get('register_number'))->first();
            if (!$register_number) {
                $pharmacy->register_number = Input::get('register_number');
                $pharmacy->name = Input::get('name');
                $pharmacy->address = Input::get('address');
                $pharmacy->city = Input::get('city');
                $pharmacy->location = Input::get('location');
                $pharmacy->availability = 1;
                $pharmacy->minimum_qty = (int)Input::get('minimum_qty');
                $pharmacy->opening_time = strtotime(Input::get('opening_time'));
                $pharmacy->closing_time = strtotime(Input::get('closing_time'));
                $pharmacy->status = 0;

                $pharmacy->save();

                return redirect('admin/pharmacy')
                    ->with('message','New pharmacy added successfully');
            }
            return redirect('admin/pharmacy/create')
                ->with('message','Pharmacy is already added');
        }
        return redirect('admin/pharmacy')
            ->with('message','Following errors occured')
            ->withErros($validator);
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
        $pharmacy = Pharmacy::find($id);

        if ($pharmacy) {
            return view('pharmacy.edit')
                    ->with('pharmacy', $pharmacy);
        }

        return redirect('admin/pharmacy')
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
        $validator = Validator::make($request->all(),Pharmacy::$erules);
        if ($validator->passes()) {
            $pharmacy = Pharmacy::find($id);
            if ($pharmacy) {
               // $pharmacy->register_number = Input::get('register_number');
                $pharmacy->name = Input::get('name');
                $pharmacy->address = Input::get('address');
                $pharmacy->city = Input::get('city');
                $pharmacy->location = Input::get('location');
                $pharmacy->availability = $request->availability;
                $pharmacy->minimum_qty = Input::get('minimum_qty');
                $pharmacy->opening_time = Input::get('opening_time');
                $pharmacy->closing_time = Input::get('closing_time');
                $pharmacy->status = $request->status;

                $pharmacy->save();

                return redirect('admin/pharmacy')
                    ->with('message','Pharmacy updated successfully');
            }
            return redirect('admin/pharmacy')
                ->with('message','pharmacy not found');
        }
        return redirect('admin/pharmacy')
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
        //delete pharmacy
        $pharmacy = Pharmacy::find($id);

        if ($pharmacy) {
            $pharmacy->delete();

            return redirect('admin/pharmacy')
                    ->with('message', 'Pharmacy Removed Successfull');
        }

        return redirect('admin/pharmacy')
                ->with('message', 'Something went wrong');
       //var_dump("sadsadasd".$id) ;
    }
}
