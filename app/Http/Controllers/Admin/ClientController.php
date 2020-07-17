<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $clients = Client::where(function($q)use($request){
            if($request->input('name')){
               $q->where('name','like','%'.$request->name.'%');
            }
            
            if($request->input('city_id')){
               $q->where('city_id',$request->city_id);
            }

            if($request->input('phone')){
               $q->where('phone','like','%'.$request->phone.'%');
            }

        })->latest()->paginate(20);
        return view('clients.index', compact('clients'));
    }

    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
        flash()->success('Deleted'); 
       return back();
    }

    public function activate($id)

        {

            $client = Client::findOrFail($id);
            $client->activated = 1;
            $client->save();
            flash()->success('activated');
            return back();

        }

        public function deActivate($id)

        {

            $client = Client::findOrFail($id);
            $client->activated = 0;
            $client->save();
            flash()->success('De-Activated');
            return back();

        }
}
