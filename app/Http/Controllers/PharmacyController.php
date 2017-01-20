<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


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
        $pharmacy = new Pharmacy();

        $register_number = DB::table('pharmacies')->where('register_number', Input::get('register_number'))->first();
        if (!$register_number) {
            $pharmacy->register_number = Input::get('register_number');
            $pharmacy->name = Input::get('name');
            $pharmacy->address = Input::get('address');
            $pharmacy->city = Input::get('city');
            $pharmacy->location = Input::get('location');
            $pharmacy->availability = 1;
            $pharmacy->minimum_qty = Input::get('minimum_qty');
            $pharmacy->opening_time = Input::get('opening_time');
            $pharmacy->closing_time = Input::get('closing_time');
            $pharmacy->status = 0;

            $pharmacy->save();
            return 1;
        }
        return 0;

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
