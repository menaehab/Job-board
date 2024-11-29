<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ProfileController extends Controller
{
    public function index() {
        $imageUrl = Auth::check() ? Auth::user()->profile_photo_url : Auth::guard('employer')->user()->profile_photo_url;
        $image = str_replace('http://localhost', '', $imageUrl);
        return view('theme.pages.profile',get_defined_vars());
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        if (Auth::guard('employer')->check()) {
            $user = Auth::guard('employer')->user();
        } else {
            $user = Auth::user();
        }
        $user->name = $request->name;
        $user->email = $request->email;
        if(isset($request->image))
        {
            $user->updateProfilePhoto($request->image);
        }

        $user->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }
}