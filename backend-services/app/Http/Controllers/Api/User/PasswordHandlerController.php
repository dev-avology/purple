<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;

class PasswordHandlerController extends Controller
{
    public function changePassword(Request $request) {
        if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            // The passwords matches
            return response()->json([
                'status' => 'error', 
                'message' => 'Your current password does not matches with the password.'
            ], 200);
        }

        if(strcmp($request->get('current_password'), $request->get('new_password')) == 0){
            // Current password and new password same
            return response()->json([
                'status' => 'error', 
                'message' => 'New Password cannot be same as your current password.'
            ], 200);
        }

        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new_password'));
        $user->save();

        return response()->json([
            'status' => 'success', 
            'message' => 'Password successfully changed!'
        ], 200);
    }
}
