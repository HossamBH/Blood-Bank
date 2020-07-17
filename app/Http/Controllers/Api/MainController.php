<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Governorate;
use App\Models\DonationRequest;
use App\Models\BloodType;
use App\Models\Post;
use App\Models\Category;
use App\Models\Setting;
use App\Models\Client;
use App\Models\Auth;
use App\Models\Contact;
use App\Models\City;
use App\Models\Token;
use App\Http\Requests\Api\ContactRequest;
use App\Http\Requests\Api\ProfileRequest;

class MainController extends Controller
{
	public function governorates()
	{
		$governorates = Governorate::all();

		return responsejson(1, 'success', $governorates);
	}

	public function cities(Request $request)
	{
		$cities = City::where(function ($query) use($request){

			if ($request->has('governorate_id'))
			{
				$query->where('governorate_id',$request->governorate_id);
			}
		})->get();

		return responsejson(1, 'success', $cities);
	}

	public function posts()
	{
		$posts = Post::with('category')->paginate(10);

		return responsejson(1, 'success', $posts);
	}

	public function bloodTypes()
	{
		$blood_types = BloodType::all();

		return responsejson(1, 'success', $blood_types);
	}

	public function settings()
	{
		$settings = Setting::all();

		return responsejson(1, 'success', $settings);
	}

	public function categories()
	{
		$categories = Category::all();

		return responsejson(1, 'success', $categories);
	}

	public function contacts(ContactRequest $request)
	{

		$contacts = Contact::create($request->all());
		return responsejson(1,'success',$contacts);
	}

	public function profile(ProfileRequest $request)
	{
		$profile = $request->user();

		$request->merge(['password' => bcrypt($request->password)]);
		$update = $request->user()->update($request->all());
		return responsejson(1, 'success', $profile);
	}

	public function getFavourates(Request $request)
	{
		
		$posts = $request->user()->posts()->pluck('post.id')->toArray();
		return responsejson(1, 'success', ['posts' => $posts]);	
	}

	public function setFavourates(Request $request)
	{
		$validator = validator()->make($request->all(),[
			'posts' => 'required',
		]);
		if ($validator->fails())
		{
			return responsejson(0,$validator->errors()->first(),$validator->errors());
		}

		$posts = $request->user()->posts()->toggle($request->posts);
		return responsejson(1, 'success', ['posts' => $posts]);
	}

    public function showPost(Request $request){

    	$post = Post::findOrFail($request);
    	if (count($post))
    	{
    		return responsejson(1,'success',$post);
    	}
    	else
    	{
    		return responsejson(1,'error');
    	}
    }
}
