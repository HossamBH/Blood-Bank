<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all();
        return view('settings.index', compact('settings'));
    }

    public function create()
    {
        return view('settings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'phone' => 'required',
            'email' => 'required',
            'fb_link' => 'required',
            'twitter_link' => 'required',
            'youtube_link' => 'required',
            'wapp_link' => 'required',
            'insta_link' => 'required',
            'gmail_link' => 'required',
        ];

        $message = [
            'phone.required' => 'Phone is required',
            'email.required' => 'Email is required',
            'fb_link.required' => 'Facebook link is required',
            'twitter_link.required' => 'Twitter link is required',
            'youtube_link.required' => 'Title is required',
            'wapp_link.required' => 'whatsapp number is required',
            'insta_link.required' => 'Instgram link is required',
            'gmail_link.required' => 'Gmail link is required',
        ];
        $this->validate($request,$rules,$message);

        $setting = Setting::create($request->all());

        flash()->success('Success');
        return redirect(route('settings.index'));
    }

    public function edit(Request $request, $id)
    {
        $model = Setting::findOrFail($id);
    
        return view('settings.edit', compact('model'));
    }

    public function update(Request $request, $id)
    {
    
        $rules = [
            'phone' => 'required',
            'email' => 'required',
            'fb_link' => 'required',
            'twitter_link' => 'required',
            'youtube_link' => 'required',
            'wapp_link' => 'required',
            'insta_link' => 'required',
            'gmail_link' => 'required',
        ];

        $message = [
            'phone.required' => 'Phone is required',
            'email.required' => 'Email is required',
            'fb_link.required' => 'Facebook link is required',
            'twitter_link.required' => 'Twitter link is required',
            'youtube_link.required' => 'Title is required',
            'wapp_link.required' => 'whatsapp number is required',
            'insta_link.required' => 'Instgram link is required',
            'gmail_link.required' => 'Gmail link is required',
        ];
        $this->validate($request,$rules,$message);
        $setting= Setting::findOrFail($id);
        $setting->update($request->all());
        flash()->success('Updated');
       return redirect(route('settings.index'));
    }
}
