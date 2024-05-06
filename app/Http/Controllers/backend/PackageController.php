<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PackageController extends Controller
{

    public function packageCreate()
    {
        $accessToken = Session::get('token');

        if ($accessToken) {
            $apiUrl = env('API_URL');

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
            ])->get("$apiUrl/package-create");

            $userData = $response->json();

            return view('backend.package.create', ['userData' => $userData, 'accessToken' => $accessToken]);
        } else {
            return redirect()->route('login');
        }
    }


    public function packageCreated(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:255',
                'validityPeriod' => 'max:255',
                'price' => 'required|max:255',
                'discount' => 'required|max:255',
                'discount_period' => 'required|max:255',
            ]);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'error' => $validator->errors()], 400);
            }

            $accessToken = Session::get('token');

            if (empty($accessToken)) {
                return response()->json(['success' => false, 'error' => 'Unauthorized - Access Token Missing'], 401);
            }

            $packageData = [
                'name' => $request->input('name'),
                'validityPeriod' => $request->input('validityPeriod'),
                'price' => $request->input('price'),
                'discount' => $request->input('discount'),
                'discount_period' => $request->input('discount_period'),
            ];

            $apiUrl = env('API_URL');

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
            ])->post("$apiUrl/package-created", $packageData);

            $responseData = $response->json();

            if (isset($responseData['success']) && $responseData['success']) {
                return redirect()->back()->with('success', 'Paket ve eğitimler başarıyla kaydedildi.');
            } else {
                return back()->withInput()->withErrors(['error' => 'Paket oluşturulamadı.']);
            }
        } catch (\Exception $exception) {
            return back()->withInput()->withErrors(['error' => $exception->getMessage()]);
        }
    }


    public function packageIndex()
    {
        $accessToken = Session::get('token');

        if ($accessToken) {
            $apiUrl = env('API_URL');

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
            ])->get("$apiUrl/package");

            $userData = $response->json();

            return view('backend.package.index', ['userData' => $userData, 'accessToken' => $accessToken]);
        } else {
            return redirect()->route('login');
        }
    }


    public function detail($id)
    {
        $accessToken = Session::get('token');

        if ($accessToken) {
            $apiUrl = env('API_URL');

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
            ])->get("$apiUrl/package/detail/$id");

            $userData = $response->json();
dd($userData);
            return view('backend.package.detail', ['userData' => $userData, 'accessToken' => $accessToken]);
        } else {
            return redirect()->route('login');
        }
    }


    public function packageGames(Request $request)
    {
        $accessToken = Session::get('token');
        $userData = Session::get('authUser');

        if ($accessToken) {
            $apiUrl = env('API_URL');

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
                $userData
            ])->post("$apiUrl/package-login");

            $userData = $response->json();

            return redirect('http://localhost:3000/bolumler/1');
        } else {
            return redirect()->route('login');
        }
    }




















}
