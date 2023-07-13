<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardProfileController extends Controller
{
   public function index(User $user)
    {
        return view('backend.profile.index', compact('user'));
    }

    public function changePassword(User $user, Request $request){
        $this->validate($request, [
            'password' => 'required|confirmed|min:8',
        ]);
            
            $input = $request->all();
            $input['password'] = Hash::make($request['password']);
            
            $user->update($input);
    

        return redirect()->back()->with('success', 'Berhasil Mengganti Password');
    }
}
