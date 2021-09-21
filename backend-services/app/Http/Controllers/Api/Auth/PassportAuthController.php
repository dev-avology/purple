<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class PassportAuthController extends Controller
{

    private $roles;

    public function __construct () {
        $this->roles = config('params.roles');
    }

    /**
     * Registration
    */
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:4',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'role' => 'required',
        ]);

        if ($this->verifyRole($request->role)) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => $request->role,
            ]);

            $user_data = $this->getUserData($user);
           
            $token = $user->createToken('purpleApp', [$request->role])->accessToken;
     
            return response()->json(['token' => $token->token, 'user_data' => $user_data], 200);
        }
        return response()->json(['error' => 'role value is not correct.'], 422);
    }
 
    /**
     * Login
    */
    public function login(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
 
        if (auth()->attempt($data)) {
            $user_data = $this->getUserData(auth()->user());
            $token = auth()->user()->createToken('purpleApp', [$user_data['role']])->accessToken;
            return response()->json(['token' => $token->token, 'user_data' => $user_data], 200);
        } else {
            return response()->json(['error' => 'Email or Password is wrong.'], 401);
        }
    }

    /**
     * Verify role if its matched with the listed roles or not
    */

    private function verifyRole($role)
    {
        return in_array($role, $this->roles);
    }

    private function getUserData($user = null)
    {
        return [
            'role'    => $user->role,
            'name'    => $user->name,
            'email'   => $user->email,
            'user_id' => $user->id,
        ];
    }
}