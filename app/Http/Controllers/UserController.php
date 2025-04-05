<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use App\Http\Requests\AddressRequest;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function register(UserRequest $request )
    {
        return response()->json(['user'=> 'hello','status' => 200]);
        $validated = $request->validated();
        try {
            $user = User::create([
                'first_name' => $validated['first_name'],
                'middle_name' => $validated['middle_name'],
                'last_name' => $validated['last_name'],
                'email' => $validated['email'],
                'password' => bcrypt($validated['password']),
                'phone' => $validated['phone'],
            ]);
            return response()->json(['user' => $user, 'status' => 200]);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

    }

    public function login(Request $request)
    {
        // dd($request);
        // $validated = $request->validated();
        // dd($validated);
        $user = User::where('email', $request['email'])->first();
        if($user){
            $checkpass = Hash::check($request->password, $user->password);
            if($checkpass){
                $token = $user->createToken('myapptoken')->plainTextToken;
                return response()->json(['user' => $user,'message'=> 'user logged in', 'token'=> $token]);
            }
        
        }

    }
    public function userDetails()
    {
        $user = Auth::user();
         return response()->json(['status' => 200, 'user' => $user]);
    }
    public function userRegistration(UserRequest $request)
    {
        $validated = $request->validated();
            $user = User::create([
                'first_name' => $validated['first_name'],
                'middle_name' => $validated['middle_name'],
                'last_name' => $validated['last_name'],
                'email' => $validated['email'],
                'password' => bcrypt($validated['password']),
                'phone' => $validated['phone'],
            ]);
            return back()->with('success', 'you have successfully registered.');
    }
    public function userLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if(Auth::attempt($request->only('email','password'))){
            return redirect()->route('dashboard')->with('success', 'successfully logged in.');
        }else{
            return back()->with('success', 'invalid credentials');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

}
