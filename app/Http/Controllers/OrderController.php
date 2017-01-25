<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('order.index')
            ->with('orders',Order::paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('order.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(),Order::$rules);
        if ($validator->passes()) {
            
            $order = new Order();

            $prescription_id = DB::table('Orders')->where('prescription_id',Input::get('prescription_id'))->first();
            if (!$prescription_id) {
                $order->prescription_id = Input::get('prescription_id');
                $order->pha_id = Input::get('pha_id');
                $order->process_status = Input::get('process_status');

                $order->save();

                return redirect('admin/order')
                    ->with('message','Order placed successfully');
            }
            return redirect('admin/order/create')
                ->with('message','Order already placed');
        }
        return redirect('admin/order/create')
            ->with('message','following errors occured')
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
