<?php

namespace App\Http\Controllers\Web;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Governorate;
use App\Models\Client;
use App\Models\BloodType;
use App\Models\Setting;
use Auth;
use App\Http\Requests\Web\SignupRequest;
use App\Http\Requests\Web\LoginRequest;

class AuthController extends Controller
{
    public function signup()
    {
    	$governorates = Governorate::all();
        return view('site.signup', compact('governorates'));
    }

    public function signupSave(Request $request)
    {
        $request->merge(['password' => bcrypt($request->password)]);
        $client = Client::create($request->all());

        $client->api_token = str_random(60);
        $client->save();
   
        return view('site.login');
    }

    public function login(Request $request)
    {
        $setting = Setting::first();
        return view('site.login',compact('setting'));
    }

    public function signin(LoginRequest $request)
    {

        $client = Client::where('phone', $request->input('phone'))->first();
        if ($client) {
            if (Auth::guard('clients')->attempt($request->only('phone', 'password'))) {
                flash()->success('مرحبا '.\auth()->guard('clients')->user()->name);
                return redirect('/');
            } else {
                flash()->error('يوجد خطأ فى بيانات الدخول');
                return back();
        return view('site.login');
            }
        }

        flash()->error('لا يوجد حساب مرتبط بهذا الرقم');

        return back();
    }
}
