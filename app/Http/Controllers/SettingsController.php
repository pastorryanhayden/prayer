<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function church()
    {
        $user = Auth::user();
        $church = $user->church;
        return view('settings.index', compact('church', 'user'));
    }

    public function churchchange(Request $request)
    {
        $user = Auth::user();
        $church = $user->church;
        $validatedData = $request->validate([
            'name' => 'required | min:6',
            'url' => 'required | url',
            'phone' => 'nullable | min:10',
            'email' => 'required ',
            'address1' => 'required',
            'address2' => 'nullable',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required'
        ]);
        $church->update($validatedData);
        return redirect('/settings');
    }
    
    

    public function user()
    {
        $user = Auth::user();
        $church = $user->church;
        return view('settings.user', compact('church', 'user'));
    }
   
    public function userchange(Request $request)
    {
        $user = Auth::user();
        $church = $user->church;
        $validatedData = $request->validate([
            'name' => 'nullable | min:6',
            'currentpassword' => 'nullable',
            'newpassword' => 'nullable',
            'confirm' => 'nullable | same:newpassword'
        ]);
        if ($request->name) {
            $user->name = $request->name;
            $user->save();
        }

        if ($request->currentpassword && !Hash::check($request->currentpassword, $user->password)) {
            return redirect('/settings/user')->with('status', "Your passwords don't match");
        }
        if ($request->currentpassword && Hash::check($request->currentpassword, $user->password) && $request->newpassword && $request->newpassword == $request->confirm) {
            $user->password = Hash::make($request->newpassword);
            $user->save();
        }

        return redirect('/settings/user');
    }
 
    
}
