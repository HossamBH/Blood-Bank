<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\PasswordRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Client;

class ChangePasswordController extends Controller
{
    public function changePassword()
    {
        return view('site.change-password');
    }

    public function changePasswordSave(PasswordRequest $request)
    {
       $client = auth()->guard('clients')->user();

       if (Hash::check($request->input('password'), $client->password))
       {
            $client->password = bcrypt($request->input('new_password'));
            $client->save();
            flash()->success('Password Updated');
            return back();
       }
       else
       {
            flash()->success('Password Wrong');
            return back();
       }
    }
}
