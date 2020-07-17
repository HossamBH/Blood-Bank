<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\DonationRequest;
use App\Models\BloodType;
use App\Http\Controllers\Controller;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $donations = DonationRequest::where(function($q)use($request){
            if($request->input('name')){
               $q->where('name','like','%'.$request->name.'%');
            }

            if($request->input('hospital_name')){
               $q->where('hospital_name','like','%'.$request->hospital_name.'%');
            }
            
            if($request->input('city_id')){
               $q->where('city_id',$request->city_id);
            }

            if($request->input('blood_type_id')){
               $q->where('blood_type_id',$request->blood_type_id);
            }

        })->latest()->paginate(20);
        return view('donations.index', compact('donations'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $donation = DonationRequest::findOrFail($id);
        return view('donations.show', compact('donation'));       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $donation = DonationRequest::findOrFail($id);
        $donation->delete();
        flash()->success('Deleted'); 
        return redirect(route('donations.index'));
    }
}
