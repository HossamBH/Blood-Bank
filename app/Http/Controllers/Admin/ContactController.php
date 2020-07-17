<?php

namespace App\Http\Controllers\Admin;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $contacts = Contact::where(function($q) use($request){
            if($request->input('name')){
               $q->where('name','like','%'.$request->name.'%');
            }
            
            if($request->input('email')){
               $q->where('email','like','%'.$request->email.'%');
            }

            if($request->input('phone')){
               $q->where('phone','like','%'.$request->phone.'%');
            }
        })->latest()->paginate(20);
        return view('contacts.index', compact('contacts'));
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        flash()->success('Deleted'); 
       return back();
    }
}
