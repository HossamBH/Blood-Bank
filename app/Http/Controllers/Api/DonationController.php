<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DonationRequest;
use App\Models\BloodType;
use App\Models\Auth;
use App\Models\City;
use App\Models\Governorate;
use App\Models\Client;
use App\Http\Requests\Api\DonationRequest;

class DonationController extends Controller
{
    public function donationRequestCreate(DonationRequest $request)
	{

		$donationRequest = $request->user()->donation_requests()->create($request->all());

		$clientId = $donationRequest->city->governorate
		->clients()->whereHas('blood_types', function($q) use($request, $donationRequest){
			$q->where('blood_types.id', $donationRequest->blood_type_id);
		})->pluck('clients.id')->toArray();

		if (count($clientId))
		{

			$notification = $donationRequest->notifications()->create([
				'title' => 'Donation Request',	
				'content' => 'Donator Blood Type is '. $donationRequest->blood_type_id , 
			]);

			$notification->clients()->attach($clientId);

			$token = Token::whereIn('client_id', $clientId)->where('token', '!=' , null)->pluck('token')->toArray();

			if (count($token))
			{
				$title = $notification->title;
				$body = $notification->content;
				$data = [
					'donation_request_id' => $donationRequest->id ,
				];

				$send = notifyByFirebase($title, $body, $token, $data);

				
			}
		}
		return responsejson(1,'success',$donationRequest);
	}

    public function searchDonations(Request $request){
        $donations = DonationRequest::where(function($query)use($request){
            if ($request->input('city_id')) {
                $query->where('city_id',$request->city_id);
            }
            if ($request->input('blood_type_id')) {
                $query->where('blood_type_id',$request->blood_type_id);
            }
        })->paginate(10);
        return responsejson(1,'success',$donations);
    }

    public function showDonation(Request $request){

    	$donation = DonationRequest::findOrFail($request);
    	if (count($donation))
    	{
    		return responsejson(1,'success',$donation);
    	}
    	else
    	{
    		return responsejson(1,'error');
    	}
    }
}
