<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BloodType;
use App\Models\Auth;
use App\Models\City;
use App\Models\Governorate;
use App\Models\Client;
use App\Http\Requests\Api\NotificationRequest;

class NotificationController extends Controller
{
    public function getNotificationSetting(Request $request)
	{
		
		$bloodTypes = $request->user()->blood_types()->pluck('blood_type.id')->toArray();
		$governorates = $request->user()->governorates()->pluck('governorate.id')->toArray();
		return responsejson(1, 'success', ['bloodTypes' => $bloodTypes, 'governorates' => $governorates]);	
	}

	public function setNotificationSetting(NotificationRequest $request)
	{
		$bloodTypes = $request->user()->blood_types()->sync($request->bloodTypes);
		$governorates = $request->user()->governorates()->sync($request->governorates);
		return responsejson(1, 'success', ['bloodTypes' => $bloodTypes, 'governorates' => $governorates]);
	}
}
