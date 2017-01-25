<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\PharmacyStore;
use App\Medicine;
class PharmacystoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pharmacyMedicines = DB::table('pharmacy_stores')
                                ->join('medicines', 'pharmacy_stores.med_id', '=', 'medicines.id')
                                ->select('pharmacy_stores.id', 'medicines.name', 'qty')
                                ->where('pha_id', 780)
                                ->paginate(5);

        return view('pharmacyStore.index')
                    ->with('pharmacyStores',$pharmacyMedicines);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicines = DB::table('medicines')->select('id', 'brand_name', 'name')->where('approval', '=', 1)->get();
        return view('pharmacyStore.create')
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
        
        
        $validator = Validator::make($request->all(),PharmacyStore::$rules);
        if ($validator->passes()) {
            $pharmacyStore = new PharmacyStore();
            $medicine = Medicine::find($request->med_id);
            if ($medicine) {
               $pharmacyStore->pha_id = 780;
               $pharmacyStore->med_id = Input::get('med_id');
               if ($request->qty == 'null') {
                    $pharmacyStore->qty = 0;
               }else{
                    $pharmacyStore->qty = Input::get('qty');
               }
               

               $pharmacyStore->save();
               return redirect('pharmacy/store')
                ->with('message','New store added');
            }
            return redirect('pharmacy/store/create')
                ->with('message','Selected medicine not available');

        }
        return redirect('pharmacy/store/create')
            ->with('message','fill all required fields');

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
        $medicines = DB::table('medicines')->select('id', 'brand_name', 'name')->where('approval', '=', 1)->get();
        
                
        $pharmacyStore = PharmacyStore::find($id);
        if ($pharmacyStore) {
            return view('pharmacyStore.edit')
                ->with('medicines', $medicines)
                ->with('pharmacyStore',$pharmacyStore);
        }
        return redirect('pharmacy/store')
            ->with('message','Something went wrong');
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
        $validator = Validator::make($request->all(),PharmacyStore::$erules);
        if ($validator->passes()) {
            $pharmacyStore = PharmacyStore::find($id);
            if ($pharmacyStore) {
                $pharmacyStore->med_id = Input::get('med_id');  
                $pharmacyStore->qty = Input::get('qty');
                
                $pharmacyStore->save();
                return redirect('pharmacy/store')
                    ->with('message','successfully updated');      
            }
            return redirect('pharmacy/store')
                    ->with('message','Something went wrong');  
        }
        return redirect('pharmacy/store')
                    ->with('message','Something went wrong')
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
        //
       
    }
}
