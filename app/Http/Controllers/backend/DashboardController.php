<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{


    public function dashboard()
    {
        $accessToken = Session::get('token');

        if ($accessToken) {
            $apiUrl = env('API_URL');
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
            ])->get($apiUrl . '/dashboard');

            if ($response->successful()) {
                $userData = $response->object();

                return view('backend.index', ['userData' => $userData , 'accessToken' => $accessToken]);
            } else {
                $error = $response->json();
                return view('backend.index')->withErrors(['error' => $error]);
            }
        } else {
            return redirect()->route('login');
        }
    }


}
