<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\DonationCreateRequest;
use App\Models\DonationRequest;
use App\Models\BloodType;
use App\Models\City;
use App\Models\Governorate;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;

class DonationController extends Controller
{
        public function donationDetails($id)
    {
        $donation = DonationRequest::findOrFail($id);
        return view('site.donation-details', compact('donation'));
    }

    public function donations(DonationCreateRequest $request)
    {
        $donations = DonationRequest::where(function($q)use($request){

        if($request->input('city_id')){
               $q->where('city_id',$request->city_id);
            }

            if($request->input('blood_type_id')){
               $q->where('blood_type_id',$request->blood_type_id);
            }

        })->latest()->paginate(20);
        return view('site.donations', compact('donations'));
    }

    public function donationCreate()
    {  
        return view('site.donation-create');
    }

    public function donationCreateSave(DonationCreateRequest $request)
    {

        $donationRequest = $request->user()->donation_requests()->create($request->all());
        $clientId = $donationRequest->city->governorate
        ->clients()->whereHas('blood_types', function($q) use($request, $donationRequest){
            $q->where('blood_types.id', $donationRequest->blood_type_id);
        })->pluck('clients.id')->toArray();
   
        return view('site.donation-create');
    }
}
