<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Mail;
use App\Mail\ResetPassword;
use App\Http\Requests\Api\SignupRequest;
use App\Http\Requests\Api\LoginRequest;

class AuthController extends Controller
{
	
	public function signup(SignupRequest $request)
	{
		$request->merge(['password' => bcrypt($request->password)]);
		$client = Client::create($request->all());

		$client->api_token = str_random(60);
		$client->save();
		return responsejson(1,'success',[
			'api_token' => $client->api_token,
			'client' => $client
		]);
	}

	public function login(LoginRequest $request)
	{
		$client = Client::where('phone',$request->phone)->first();
		if ($client)
		{
			if (Hash::check($request->password,$client->password))
			{
				return responsejson(1,'success',[
				'api_token' => $client->api_token,
				'client' => $client
				]);
			}
			else
			{
				return responsejson(0,'errorpassword');
			}
		}
		else
			{
				return responsejson(0,'error');
			}
	}

	public function resetPassword(Request $request)
	{
		$validator = validator()->make($request->all(),[
			'phone' => 'required',
		]);
		if ($validator->fails())
		{
			return responsejson(0,$validator->errors()->first(),$validator->errors());
		}

		$client = Client::where('phone',$request->phone)->first();

		if ($client)
		{
			$pin = rand(1111,9999);
			$update = $client->update(['pin_code' => $pin]);

			if($update)
			{
				Mail::to($client->email)
				    ->bcc("testwork094@gmail.com")
				    ->send(new ResetPassword($pin));
				return responsejson(1,'success');
			}
			else
			{
				return responsejson(0,'error');
			}
		}
		else
		{
			return responsejson(0,'error');
		}
	}

	public function newPassword(Request $request)
	{
		$validator = validator()->make($request->all(),[
			'pin_code' => 'required',
			'password' => 'required|confirmed',
			'password_confirmation' => 'required',

		]);

		if ($validator->fails())
		{
			return responsejson(0,$validator->errors()->first(),$validator->errors());
		}

		$client = Client::where('pin_code', $request->pin_code)->first();

		if ($client)
		{
			$request->merge(['password' => bcrypt($request->password)]);
			$update = $client->update(['password' => $request->password]);
			$update = $client->update(['pin_code' => null]);
			return responsejson(1,'success');
		}
		else
		{
			return responsejson(0,'error');
		}
	}

	public function registerToken(Request $request)
	{
		$validator = validator()->make($request->all(),[
			'token' => 'required',
			'platform' => 'required|in:android,ios',
		]);

		if ($validator->fails())
		{
			return responsejson(0,$validator->errors()->first(),$validator->errors());
		}	

		Token::where('token',$request->token)->delete();
		$request->user()->tokens->create($request->all());
		return responsejson(1,'success');
	}

	public function removeToken(Request $request)
	{
		$validator = validator()->make($request->all(),[
			'token' => 'required',
		]);

		if ($validator->fails())
		{
			return responsejson(0,$validator->errors()->first(),$validator->errors());
		}	

		Token::where('token',$request->token)->delete();
		return responsejson(1,'success');
	}
}

	