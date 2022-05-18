<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
      
        $imageName = time().'.'.$request->image->extension();  
       
        $request->image->move(public_path('profile_images'), $imageName);

        User::where('id', Auth::user()->id)->update([
            'name' => $request->input('full_name'),
            'image_profile' => $imageName
        ]);

        return redirect()->route('myprofile')->with('success', 'Successfully profile updated.');
    }
}
