<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function login()
    {
        $accessToken = Session::get('token');

        if ($accessToken) {

            return redirect()->route('dashboard');
        } else {
            return view('auth.login');
        }
    }


    public function logins(Request $request)
    {
        try {
            $formData = $request->all();
            $apiUrl = env('API_URL');
            $response = Http::post($apiUrl.'/login', $formData);
            $responseData = json_decode($response->body(), true);

            if(isset($responseData['access_token'])) {

                session(['token' => $responseData['access_token']]);
                session(['authUser' => $responseData['user']]);

                return redirect()->route('dashboards')->with('responseData', $responseData);
            }

            return redirect()->back()->withErrors('errors', '500');
        } catch (\Exception $exception) {
            return redirect()->back();
        }
    }


    public function register()
    {
        return view('auth.register');
    }


    public function registered(Request $request)
    {
        try {
            $formData = $request->all();
            $apiUrl = env('API_URL');
            $response = Http::post($apiUrl.'/register', $formData);
            $responseData = json_decode($response->body(), true);

            if (isset($responseData['success']) && $responseData['success']) {
                return redirect()->route('login')->with('success', $responseData['message']);
            } else {
                $errorMessage = isset($responseData['error']) ? $responseData['error'] : 'Kayıt işlemi sırasında bir hata oluştu.';
                return redirect()->back()->withErrors(['errors' => [$errorMessage]])->withInput();
            }
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['errors' => [$exception->getMessage()]])->withInput();
        }
    }

    public function signout()
    {
        auth()->logout();
        session()->flush();
        return redirect()->route('login');
    }

    public function users()
    {
        $accessToken = Session::get('token');

        if ($accessToken) {
    $apiUrl = env('API_URL');

    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . $accessToken,
    ])->get($apiUrl . '/users');

    if ($response->successful()) {
        $userData = $response->object();

        return view('backend.member.index', ['userData' => $userData, 'accessToken' => $accessToken]);
    } else {
        $error = $response->json();
        return view('backend.member.index')->withErrors(['error' => $error]);
    }
    } else {
            return view('backend.member.index');
        }
    }

    public function create()
    {
        $accessToken = Session::get('token');

        if ($accessToken) {

            return view('backend.member.create');
        } else {
            return view('auth.login');
        }

    }

    public function created(Request $request)
    {
        try {
            $formData = $request->all();
            $response = Http::post('http://127.0.0.1:8001/register', $formData);
            $responseData = json_decode($response->body(), true);

            if (isset($responseData['success']) && $responseData['success']) {
                return redirect()->back()->with('success', $responseData['message']);
            } else {
                $errorMessage = isset($responseData['error']) ? $responseData['error'] : 'Kayıt işlemi sırasında bir hata oluştu.';
                return redirect()->back()->withErrors(['errors' => [$errorMessage]])->withInput();
            }
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['errors' => [$exception->getMessage()]])->withInput();
        }
    }


    public function update($id)
    {
        $accessToken = Session::get('token');

        if ($accessToken) {
            $apiUrl = env('API_URL');
            $url = $apiUrl . '/user-update/' . $id;

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
            ])->get($url);

            if ($response->successful() && is_array($response->json('user'))) {
                $userData = (object) $response->json('user');

                return view('backend.member.update', ['userData' => $userData, 'accessToken' => $accessToken]);
            } else {
                return redirect()->route('login');
            }
        } else {
            return redirect()->route('login');
        }
    }



    public function updated(Request $request)
    {
        $accessToken = Session::get('token');

        try {
            $formData = $request->all();

            $apiUrl = env('API_URL');
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
            ])->post($apiUrl . '/user-updated', $formData);

            $responseData = json_decode($response->body(), true);

            if (isset($responseData['success']) && $responseData['success']) {
                return redirect()->back()->with('success', $responseData['message']);
            } else {
                $errorMessage = isset($responseData['error']) ? $responseData['error'] : 'Kayıt işlemi sırasında bir hata oluştu.';
                return redirect()->back()->withErrors(['errors' => [$errorMessage]])->withInput();
            }
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['errors' => [$exception->getMessage()]])->withInput();
        }
    }


    public function delete($id)
    {
        $accessToken = Session::get('token');

        if ($accessToken) {
            $apiUrl = env('API_URL');
            $url = $apiUrl . '/user-delete/' . $id;

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
            ])->get($url);

            if ($response->successful() ) {
                return redirect()->route('users');
            } else {
                return redirect()->route('login');
            }
        } else {
            return redirect()->route('login');
        }
    }


}
