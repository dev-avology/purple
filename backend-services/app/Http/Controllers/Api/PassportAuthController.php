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
           
            $token = $user->createToken('purpleApp', [$request->role])->accessToken;
     
            return response()->json(['token' => $token->token, 'role' => $request->role], 200);
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
            $role = auth()->user()->role;
            $token = auth()->user()->createToken('purpleApp', [$role])->accessToken;
            return response()->json(['token' => $token->token, 'role' => $role], 200);
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
}