<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    private $baseUrl;
    public function __construct()
    {
        $this->baseUrl = config('app.base_url');
    }
    public function register()
    {
        return view('user.register');
    }
    public function login()
    {
        return view('user.login');
    }
    public function userRegistration(Request $request)
    {
dd('hello');
        $response = Http::withHeaders([
            'Content-Type' => 'application/json'
            ])
            ->post($this->baseUrl.'register',[
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'email' => $request->email_id,
            'phone' => $request->mobile_number,
            'password' => $request->password,

        ]);
        $data = $response->json();
        dd($data);
        dd($this->baseUrl);
        dd($request);
    }
}
