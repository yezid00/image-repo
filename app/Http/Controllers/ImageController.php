<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\User;

class ImageController extends Controller
{
	public function add()
	{
		return view('images.add');
	}

    public function saveImage(Request $request)
    {
    	
    	$user = auth()->user();

    	$allowedfileExtension=['jpeg','jpg','png','gif'];

        
    	$images = $request->file('images');

    	foreach ($images as $img) {
			$details['image'] = $img->getClientOriginalName();
			$filename = $details['image'];
			$details['image_path'] = $img->storeAs('repo',$filename);
			$details['permission'] = $request->permission == null ? 0 : 1;
			$details['user_id'] = $user->id;
			$details_to_save[] = $details;

			$img->move(public_path('repo'),$filename);

			$extension = $img->getClientOriginalExtension();

			$check = in_array($extension,$allowedfileExtension);

    	}
    	if($check)
    	{
    		foreach ($details_to_save as $det) 
    		{
				Image::create($det);	
    		}

    		return redirect()->route('home')->withSuccess('Image upload successful');
    	}else
    	{
    		return redirect()->back()->withError('filetype not accepted');
    	}

    }
}
