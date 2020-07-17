<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\DonationRequest;
use App\Models\BloodType;
use App\Models\City;
use App\Models\Governorate;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Client;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Web\ContactRequest;

class MainController extends Controller
{
    public function articles()
    {
        $posts = Post::all();
        $categories = Category::all();
        return view('site.article', compact('posts', 'categories'));
    }

    public function articleDetails($id)
    {
        $article = Post::findOrFail($id);
        $posts = Post::where('category_id', $article->category_id)->get();
        return view('site.article-details', compact('article', 'posts'));
    }

    public function setting(Request $request)
    {
        return view('site.contact-us');
    }

    public function howWeAre(Request $request)
    {
        return view('site.how-we-are');
    }

    public function home(Request $request)
    {
        $posts = Post::paginate(5);
        $donations = DonationRequest::where(function($q)use($request){

        if($request->input('city_id')){
           $q->where('city_id',$request->city_id);
        }

        if($request->input('blood_type_id')){
           $q->where('blood_type_id',$request->blood_type_id);
        }

    })->latest()->paginate(5);
        $bloodTypes = BloodType::all();
        $cities = City::all();
        return view('site.Home', compact('posts','donations', 'bloodTypes', 'cities'));
    }

    public function toggleFavourite(Request $request)
    {
        $posts = $request->user()->posts()->toggle($request->post_id);
        return responsejson(1,'success',$posts);
    }

    public function contact(ContactRequest $request)
    {
        $contact = Contact::create($request->all());
        return view('site.contact-us', compact('contact'));
    }
}
